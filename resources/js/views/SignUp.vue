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
            <form role="form"  @submit.prevent="submitForm">
              <div class="mb-3">
                <soft-input
                  id="name"
                  type="text"
                  name="name"
                  placeholder="Login"
                  aria-label="name"
                  v-model="formData.name"
                />
              </div>
              <div class="mb-3">
                <soft-input
                  id="firstName"
                  type="text"
                  name="first_name"
                  placeholder="firstName"
                  aria-label="firstName"
                  v-model="formData.first_name"
                />
              </div>
              <div class="mb-3">
                <soft-input
                  id="lastName"
                  type="text"
                  name="last_name"
                  placeholder="lastName"
                  aria-label="lastName"
                  v-model="formData.last_name"
                />
              </div>
              <div class="mb-3">
                <soft-input
                  id="email"
                  type="email"
                  name="email"
                  placeholder="Email"
                  aria-label="Email"
                  v-model="formData.email"
                />
              </div>
              <div class="mb-3">
                <soft-input
                  id="password"
                  type="password"
                  name="password"
                  placeholder="Password"
                  aria-label="Password"
                  v-model="formData.password"
                />
              </div>
              <div class="mb-3">
                <soft-input
                  id="password_confirmation"
                  type="password"
                  name="password_confirmation"
                  placeholder="Password Confirmation" 
                  aria-label="Password confirmation"
                  v-model="formData.password_confirmation"
                />
              </div>
              <div class="mb-3">
                <soft-input
                  id="mobile"
                  type="text"
                  name="mobile"
                  placeholder="mobile"
                  aria-label="mobile"
                  v-model="formData.mobile"
                />
              </div>
              <div class="mb-3">
                <label class="form-label">Profile</label>
                <select class="form-select" name="profile"  v-model="formData.profile">
                  <option disabled selected value="">Please select one</option>
                  <option value="ROLE_L1">ROLE_L1</option>
                  <option value="ROLE_L2">ROLE_L2</option>
                  <option value="ROLE_L3">ROLE_L3</option>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label">Choose Service</label>
                <select class="form-select" name="service"  v-model="formData.service">
                  <option disabled selected value="">Please select one</option>
                  <option value="parivar_number">parivar number</option>
                  
                </select>
              </div>

              <div class="text-center">
                <soft-button
                  color="warning"
                  full-width
                  variant="gradient"
                  class="my-4 mb-2 w-auto"
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
import axios from '@/axios-config';

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
      formData: {
        name: '',
        first_name: '',
        last_name: '',
        mobile:'',
        email: '',
        password: '',
        password_confirmation: '',
        profile:'',
        service:''
      }
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

    async submitForm() {
      const response = await this.$store.dispatch('auth/register', this.formData)
    }
    
  },
};
</script>
