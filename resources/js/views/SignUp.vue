<template>
  <navbar btn-background="bg-gradient-primary" />
  <div
    class="pt-5 m-3 page-header align-items-start min-vh-50 pb-11 border-radius-lg"
    :style="{
      backgroundImage: `url(${curvedImage})`,
    }"
  >
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container">
      <div class="row justify-content-center">
        <div class="mx-auto text-center col-lg-5">
          <h1 class="mt-5 mb-2 text-white">Welcome!</h1>
          <p class="text-white text-lead">
            Add New User.
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
      <div class="mx-auto col-12">
        <div class="card z-index-0">
          <div class="card-body">
            <form role="form">
              <div class="mb-3">
                <soft-input
                  id="name"
                  type="text"
                  placeholder="Login"
                  aria-label="Name"
                />
              </div>
              <div class="mb-3">
                <soft-input
                  id="firstName"
                  type="text"
                  placeholder="firstName"
                  aria-label="firstName"
                />
              </div>
              <div class="mb-3">
                <soft-input
                  id="lastName"
                  type="text"
                  placeholder="lastName"
                  aria-label="lastName"
                />
              </div>
              <div class="mb-3">
                <soft-input
                  id="email"
                  type="email"
                  placeholder="Email"
                  aria-label="Email"
                />
              </div>
              <div class="mb-3">
                <soft-input
                  id="password"
                  type="password"
                  placeholder="Password"
                  aria-label="Password"
                />
              </div>
              <div class="mb-3">
                <soft-input
                  id="mobile"
                  type="text"
                  placeholder="mobile"
                  aria-label="mobile"
                />
              </div>
              <div class="row mb-3">
              <label class="form-label">Profile</label>
              <select v-model="selected">
              <option disabled value="">Please select one</option>
              <option>Role1</option>
              <option>role2</option>
              <option>role3</option>
            </select>
            </div>
            <div class="row mb-3">
              <label class="form-label">Choose Service</label>
              <select v-model="selected">
              <option disabled value="">Please select one</option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
            </select>
            </div>
              <soft-checkbox
                id="flexCheckDefault"
                name="flexCheckDefault"
                class="font-weight-light"
                checked
              >Close </soft-checkbox>

              <div class="text-center">
                <soft-button
                  color="warning"
                  full-width
                  variant="gradient"
                  class="my-4 mb-2"
                  >Sign up</soft-button
                >
              </div>
              <p class="text-sm mt-3 mb-0">
                Already have an account?
                <router-link
                  :to="{ name: 'Sign In' }"
                  class="text-warning font-weight-bolder"
                >
                  Sign in
                </router-link>
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <app-footer />
</template>

<script>
import Navbar from "@/examples/PageLayout/Navbar.vue";
import AppFooter from "@/examples/PageLayout/Footer.vue";
import SoftInput from "@/components/SoftInput.vue";
import SoftCheckbox from "@/components/SoftCheckbox.vue";
import SoftButton from "@/components/SoftButton.vue";
import curvedImage from '@/assets/img/curved-images/curved9.jpg';

import { mapMutations } from "vuex";

export default {
  name: "SignupBasic",
  components: {
    Navbar,
    AppFooter,
    SoftInput,
    SoftCheckbox,
    SoftButton,
  },
  data() {
    return {
      curvedImage,
    };
  },
  created() {
    this.toggleEveryDisplay();
    this.toggleHideConfig();
  },
  beforeUnmount() {
    this.toggleEveryDisplay();
    this.toggleHideConfig();
  },
  methods: {
    ...mapMutations(["toggleEveryDisplay", "toggleHideConfig"]),
  },
};
</script>
