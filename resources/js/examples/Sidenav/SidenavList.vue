<template>
  <div
    class="w-auto h-auto collapse navbar-collapse max-height-vh-100 h-100"
    id="sidenav-collapse-main"
  >
    <ul class="navbar-nav">
      <li class="nav-item">
        <sidenav-collapse navText="Dashboard" :to="{ name: 'Dashboard' }">
          <template #icon>
            <shop />
          </template>
        </sidenav-collapse>
      </li>
      <li class="mt-3 nav-item" v-if="hasPermission('user_management')">
        <h6
          class="text-xs ps-4 text-uppercase font-weight-bolder opacity-6"
          :class="this.$store.state.isRTL ? 'me-4' : 'ms-2'"
        >
         Users
        </h6>
      </li>
      <!-- <li class="nav-item">
        <sidenav-collapse navText="Login" :to="{ name: 'Login' }">
          <template #icon>
            <document />
          </template>
        </sidenav-collapse>
      </li>
      <li class="nav-item">
        <sidenav-collapse navText="Register" :to="{ name: 'Register' }">
          <template #icon>
            <spaceship />
          </template>
        </sidenav-collapse>
      </li> -->
      <!-- <li class="nav-item">
        <sidenav-collapse navText="Add User" :to="{ name: 'Profile' }">
          <template #icon>
            <customer-support />
          </template>
        </sidenav-collapse>
      </li> -->
      <li class="nav-item">
        <sidenav-collapse navText="User Management" :to="{ name: 'Users' }" v-if="!hasPermission('user_management')" >
          <template #icon>
            <switches />
          </template>
        </sidenav-collapse>
      </li>
      <!-- <li class="mt-3 nav-item">
        <h6
          class="text-xs ps-4 text-uppercase font-weight-bolder opacity-6"
          :class="this.$store.state.isRTL ? 'me-4' : 'ms-2'"
        >
          TEMPLATES
        </h6>
      </li> -->
      <li class="mt-3 nav-item" v-if="!hasPermission('ticket_management')">
        <h6
          class="text-xs ps-4 text-uppercase font-weight-bolder opacity-6"
          :class="this.$store.state.isRTL ? 'me-4' : 'ms-2'"
        >
         Tickets
        </h6>
      </li>
      <li class="nav-item" v-if="hasPermission('ticket_management')">
        <sidenav-collapse navText="Tickets" :to="{ name: 'IndexTicket' }">
          <template #icon>
            <customer-support />
          </template>
        </sidenav-collapse>
      </li>
      
      <li class="nav-item" v-if="hasPermission('ticket_management')">
        <sidenav-collapse navText="Search Ticket" :to="{ name: 'SearchTicket' }">
          <template #icon>
            <office />
          </template>
        </sidenav-collapse>
      </li>
      <li class="nav-item">
        <sidenav-collapse navText="ContactUs" :to="{ name: 'ContactUs' }">
          <template #icon>
            <credit-card />
          </template>
        </sidenav-collapse>
      </li>

      <!--<li class="nav-item">
        <sidenav-collapse
          navText="Virtual Reality"
          :to="{ name: 'Virtual Reality' }"
        >
          <template #icon>
            <box3d />
          </template>
        </sidenav-collapse>
      </li>
      <li class="nav-item">
        <sidenav-collapse navText="RTL" :to="{ name: 'Rtl' }">
          <template #icon>
            <settings />
          </template>
        </sidenav-collapse>
      </li> -->
      <!-- <li class="nav-item">
        <sidenav-collapse navText="Profile" :to="{ name: 'ProfileTemplate' }">
          <template #icon>
            <customer-support />
          </template>
        </sidenav-collapse>
      </li> -->
      <li class="nav-item" v-if="!loggedIn">
        <sidenav-collapse navText="Sign In" :to="{ name: 'Sign In' }">
          <template #icon>
            <document />
          </template>
        </sidenav-collapse>
      </li>
      <li class="nav-item" v-if="!loggedIn">
        <sidenav-collapse navText="Sign Up" :to="{ name: 'Sign Up' }">
          <template #icon>
            <spaceship />
          </template>
        </sidenav-collapse>
      </li>

      <li class="nav-item d-flex justify-content-center" v-if="loggedIn">
        <soft-button
          class="float-end mt-6 mb-0"
          color="warning"
          variant="gradient"
          size="sm"
          @click="handleLogout"
        >
          <span>Logout</span>
        </soft-button
        >
      </li>
    </ul>
  </div>
</template>
<script>
import SidenavCollapse from "./SidenavCollapse.vue";
import SidenavCard from "./SidenavCard.vue";
import Shop from "../../components/Icon/Shop.vue";
import Office from "../../components/Icon/Office.vue";
import CreditCard from "../../components/Icon/CreditCard.vue";
import Box3d from "../../components/Icon/Box3d.vue";
import CustomerSupport from "../../components/Icon/CustomerSupport.vue";
import Switches from "../../components/Icon/Switches.vue";
import Document from "../../components/Icon/Document.vue";
import Spaceship from "../../components/Icon/Spaceship.vue";
import Settings from "../../components/Icon/Settings.vue";
import SoftButton from "@/components/SoftButton.vue";

export default {
  name: "SidenavList",
  props: {
    cardBg: String,
  },
  data() {
    return {
      title: "Ticket Tool",
      controls: "dashboardsExamples",
      isActive: "active",
      permissions: [],
    };
  },
  components: {
    SidenavCollapse,
    SidenavCard,
    Shop,
    Office,
    CreditCard,
    Box3d,
    CustomerSupport,
    Switches,
    Document,
    Spaceship,
    Settings,
    SoftButton,
  },
  computed: {
    loggedIn() {
      return this.$store.getters["auth/loggedIn"];
    },
  },
  async mounted() {
    // let isLoggedIn = this.$store.getters["auth/loggedIn"];
    // if(isLoggedIn) {
    //   this.permissions = this.$store.getters["auth/getPermissions"];
    // }
  },
  methods: {
    getRoute() {
      const routeArr = this.$route.path.split("/");
      return routeArr[1];
    },
    async handleLogout() {
      try {
        await this.$store.dispatch("auth/logout");
      } finally {
        this.$router.push("/sign-in");
      }
    },

    hasPermission(value) {
      return this.permissions?.includes(value);
    },
  },
};
</script>
