<template>
    <div class="container-fluid mt-4">
      <div class="row">
        <form role="form"  @submit.prevent="submitForm">

            <div class="col-12">
                <div id="basic-info" class="container card mt-4">
                    <div class="card-header">
                        <h5>User Info</h5>
                    </div>

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
                        <option v-for="item in roles" :value="item.name" :key="item.id">{{ toUpperCase(item.name) }}</option>
                        </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Category</label>
                      <select class="form-select" name="category_id" v-model="formData.category_id">
                        <option disabled value="">Please select one</option>
                        <option value="1" >Management</option>
                        <option value="2" >Technical</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">SubCategory</label>
                      <select class="form-select"name="sub_category_id" v-model="formData.sub_category_id"  @change="getSubcategories">
                      <option disabled selected value="">Please select one</option>
                      <option v-for="item in categories" :value="item.id" :key="item.id">{{ item.name }}</option>
                    </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">ChildSubCategory</label>
                      <select class="form-select"name="child_sub_category_id" v-model="formData.child_sub_category_id">
                      <option disabled selected value="">Please select one</option>
                      <option v-for="item in subcategories" :value="item.id">{{ item.name }}</option>
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
                        class="my-4 mb-4 w-auto"
                        >Create</soft-button
                        >
                    </div>
                    <!-- <p class="text-sm mt-3 mb-0">
                        Already have an account?
                        <router-link
                        :to="{ name: 'Sign In' }"
                        class="text-warning font-weight-bolder"
                        >
                        Sign in
                        </router-link>
                    </p> -->
                </div>
            </div>
            
        </form>
  
      </div>
    </div>
  </template>
  
  <script>
  import Navbar from "@/examples/PageLayout/Navbar.vue";
import AppFooter from "@/examples/PageLayout/Footer.vue";
import SoftInput from "@/components/SoftInput.vue";
import SoftCheckbox from "@/components/SoftCheckbox.vue";
import SoftButton from "@/components/SoftButton.vue";
import curvedImage from '@/assets/img/curved-images/curved9.jpg';
  
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
        service:'',
        category_id: '',
        sub_category_id:'',
        child_sub_category_id:'',
      }
    };
  },
  mounted() {
    this.$store.dispatch("categories/fetchAll");
    
  },
  computed: {
    roles() {
      return this.$store.getters["auth/getRoles"];
    },
    categories() {
      return this.$store.getters['categories/getAll'];
    },
    subcategories() {
      return this.$store.getters['categories/getCurrentSubcategories'];
    },
  },
  methods: {
    toUpperCase(value) {
      return value.toUpperCase();
    },
    async submitForm() {
      const response = await this.$store.dispatch('users/create', this.formData)
      if (response.success) {
        this.$router.push('/users');
    } else {
        console.log(response);
    }

    },
    async getSubcategories() {
      const allCategories = await this.categories;
      const res = allCategories.filter(category => category.id == this.formData.sub_category_id);
      await this.$store.dispatch("categories/setCurrentSubcategories", res[0].subcategories);
      return res[0].subcategories;
    }
    
  },
};
  
  </script>
  
  <style>
    img {
      object-fit: cover;
    }
  </style>
  