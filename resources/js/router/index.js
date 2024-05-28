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
import CreateUser from "@/views/users/Create.vue";

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
    meta: { requiresAuth: true, requiredPermissions: ['user_management'] }
  },
  {
    path: "/users/create",
    name: "UsersCreate",
    component: CreateUser,
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
    path: "/tickets/:id",
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

  // if (to.name !== 'Sign In' && store.getters['auth/getPermissions'] == undefined) {
  //   try {
  //     await store.dispatch('auth/getPermissions');
  //   } catch (error) {
  //     console.error('Error fetching permissions on page reload:', error);
  //   }
  // }
  next();


//   // If the route does not have any middleware defined,
//   // directly call the auth function and proceed to the next route.
//   if (!to.meta.middleware) {

//     // if (checkPermissions(to)) {
//     //   auth({ ...context, next }); // Simplified to just pass next
//     //   return next(); // Call next() to proceed to the next route
//     // } else {
//     //   // Redirect to unauthorized page or handle unauthorized access
//     //   return next('/unauthorized');
//     // }

    
//     auth({ ...context, next }); // Simplified to just pass next
//     return next(); // Call next() to proceed to the next route
//   }

//   // If middleware is defined for the route, execute the first middleware
//   const middleware = to.meta.middleware;
//   return middleware[0]({
//     ...context,
//     next: middlewarePipeline(context, middleware, 1), // Call middlewarePipeline with updated next
//   });
});

function checkPermissions(route) {
  // console.log(route.meta.requiredPermissions);
  // console.log(router.app.$store.getters["auth/getPermissions"])
  const userPermissions = store.getters["auth/getPermissions"];
  // console.log(store.getters['auth/getPermissions'], 'store.state'); 


  return true;
}

export default router;
