import { createRouter, createWebHistory } from "vue-router";
import Dashboard from "@/views/Dashboard.vue";
import Tables from "@/views/Tables.vue";
import Billing from "@/views/Billing.vue";
import VirtualReality from "@/views/VirtualReality.vue";
import ProfileTemplate from "../views/ProfileTemplate.vue";
import Rtl from "@/views/Rtl.vue";
import SignIn from "@/views/SignIn.vue";
import SignUp from "@/views/SignUp.vue";
import Login from "@/views/Login.vue";
import Register from "@/views/Register.vue";
import SendEmail from "../views/SendEmail.vue";
import ResetPassword from "../views/ResetPassword.vue";
import Profile from "@/views/Profile.vue";
import Users from "../views/Users.vue";
import store from "../store";
import guest from "../middlewares/guest.js";
import auth from "../middlewares/auth.js";
import CreateTicket from "@/views/tickets/CreateTicket.vue";
import IndexTicket from "@/views/tickets/IndexTicket.vue";
import SearchTicket from "@/views/tickets/SearchTicket.vue";
import TicketDetail from "@/views/tickets/ShowTicket.vue";
import ContactUs from "@/views/ContactUs.vue";

function middlewarePipeline(context, middleware, index) {
  const nextMiddleware = middleware[index];

  if (!nextMiddleware) {
    return context.next;
  }

  return () => {
    const nextPipeline = middlewarePipeline(context, middleware, index + 1);

    nextMiddleware({ ...context, next: nextPipeline });
  };
}


const routes = [
  {
    path: "/",
    name: "/",
    redirect: "/dashboard",
    meta: {
      middleware: [auth],
    },
  },
  {
    path: "/dashboard",
    name: "Dashboard",
    component: Dashboard,
  },
  {
    path: "/tables",
    name: "Tables",
    component: Tables,
  },
  {
    path: "/billing",
    name: "Billing",
    component: Billing,
  },
  {
    path: "/virtual-reality",
    name: "Virtual Reality",
    component: VirtualReality,
  },
  {
    path: "/profileTemplate",
    name: "ProfileTemplate",
    component: ProfileTemplate,
  },
  {
    path: "/rtl-page",
    name: "Rtl",
    component: Rtl,
  },
  {
    path: "/sign-in",
    name: "Sign In",
    component: SignIn,
    meta: {
      middleware: [guest],
    },
  },
  {
    path: "/sign-up",
    name: "Sign Up",
    component: SignUp,
    meta: {
      //middleware: [guest],
    },
  },
  {
    path: "/login",
    name: "Login",
    component: Login,
    meta: {
      middleware: [guest],
    },
  },
  {
    path: "/register",
    name: "Register",
    component: Register,
    meta: {
      middleware: [guest],
    },
  },
  {
    path: "/password/email",
    name: "SendEmail",
    component: SendEmail,
    meta: {
      middleware: [guest],
    },
  },
  {
    path: "/password/reset",
    name: "ResetPassword",
    component: ResetPassword,
    meta: {
      middleware: [guest],
    },
  },
  {
    path: "/profile",
    name: "Profile",
    component: Profile,
  },
  {
    path: "/users",
    name: "Users",
    component: Users,
  },
  {
    path: "/create-ticket",
    name: "CreateTicket",
    component: CreateTicket,
  },
  {
    path: "/tickets",
    name: "IndexTicket",
    component: IndexTicket,
  },
  {
    path: "/search-ticket",
    name: "SearchTicket",
    component: SearchTicket,
  },
  {
    path: "/ticket-details",
    name: "TicketDetail",
    component: TicketDetail,
  },
  {
    path: "/contact-us",
    name: "ContactUs",
    component: ContactUs,
  },
];

const router = createRouter({
  history: createWebHistory('/'),
  routes,
  linkActiveClass: "active",
});

// eslint-disable-next-line no-unused-vars
router.beforeEach( async (to, from, next) => {
  const context = {
    to,
    from,
    next,
    store,
  };

  // If the route does not have any middleware defined,
  // directly call the auth function and proceed to the next route.
  if (!to.meta.middleware) {
    auth({ ...context, next }); // Simplified to just pass next
    return next(); // Call next() to proceed to the next route
  }

//   // If middleware is defined for the route, execute the first middleware
//   const middleware = to.meta.middleware;
//   return middleware[0]({
//     ...context,
//     next: middlewarePipeline(context, middleware, 1), // Call middlewarePipeline with updated next
//   });
});

export default router;
