<template>
  <div class="container-fluid mt-4">
    <div id="profile" class="card card-body mt-4">
      <div v-if="profile" class="row justify-content-center align-items-center">
        <div class="col-sm-auto col-4">
          <soft-avatar
            :img="pic"
            alt="profile"
            size="xl"
            shadow="sm"
            border-radius="lg"
          />
        </div>
        <div class="col-sm-auto col-8 my-auto">
          <div class="h-100">
            <h5 class="mb-1 font-weight-bolder">{{ profile.name }}</h5>
            <p class="mb-0 font-weight-bold text-sm">{{ profile.email }}</p>
          </div>
        </div>

        <div class="col-sm-auto ms-sm-auto mt-sm-0 mt-3 d-flex">
          <label class="form-check-label mb-0 me-2">
            <small id="profileVisibility">Switch to invisible</small>
          </label>
          <soft-switch id="profile" name="profileVisibility" checked />
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-6">
        <div id="basic-info" class="card mt-4">
          <div class="card-header">
            <h5>User Info</h5>
          </div>

          <div class="card-body pt-0">
            <div class="row mb-3">
              <label class="form-label">Applicant Name</label>
              <soft-model-input
                id="name"
                v-model="profileChange.name"
                type="text"
                placeholder="Alec"
              />
              <validation-error :errors="apiValidationErrors.name" />
            </div>

            <div class="row mb-3">
              <label class="form-label mt-2">Applicant Email</label>
              <soft-model-input
                id="email"
                v-model="profileChange.email"
                type="email"
                placeholder="example@email.com"
              />
              <validation-error :errors="apiValidationErrors.email" />
            </div>
            <div class="row mb-3">
              <label class="form-label mt-2">Applicant Mobile</label>
              <soft-model-input
                id="email"
                v-model="profileChange.moblie"
                type="text"
                placeholder="6789534687"
              />
              <validation-error :errors="apiValidationErrors.mobile" />
            </div> 
            <div class="row mb-3">
              <label class="form-label mt-2">Applicant FamilyId</label>
              <soft-model-input
                id="email"
                v-model="profileChange.familyId"
                type="text"
                placeholder="7865RT66"
              />
              <validation-error :errors="apiValidationErrors.familyId" />
            </div>
            <div class="row mb-3">
              <label class="form-label">District</label>
              <select v-model="selected">
              <option disabled value="">Please select one</option>
              <option>Accv</option>
              <option>Bvvv</option>
              <option>Cvv</option>
            </select>
            </div>
            <div class="row mb-3">
              <label class="form-label" for="checkbox">Close</label>
              <input
                type="checkbox"
                v-model="toggle"
                true-value="yes"
                false-value="no" />
              
              
            </div>

           
          </div>
        </div>
      </div>

      <div class="col-6">
        <div id="password" class="card mt-4">
          <div class="card-header">
            <h5>Basic Info</h5>
          </div>
          

          <div class="card-body pt-0">
            <div class="row mb-3">
              <label class="form-label">Type:</label>
              <select v-model="selected">
              <option disabled value="">Please select one</option>
              <option>All</option>
              <option>Query</option>
              <option>Modification</option>
            </select>
            </div>
            <div class="row mb-3">
              <label class="form-label">Source</label>
              <select v-model="selected">
              <option disabled value="">Please select one</option>
              <option>Accv</option>
              <option>Bvvv</option>
              <option>Cvv</option>
            </select>
            </div>

            <div class="row mb-3">
              <label class="form-label">Channel</label>
              <select v-model="selected">
              <option disabled value="">Please select one</option>
              <option>Accv</option>
              <option>Bvvv</option>
              <option>Cvv</option>
            </select>
            </div>
            <div class="row mb-3">
              <label class="form-label">Category</label>
              <select v-model="selected">
              <option disabled value="">Please select one</option>
              <option>Accv</option>
              <option>Bvvv</option>
              <option>Cvv</option>
            </select>
            </div>
            <div class="row mb-3">
              <label class="form-label">SubCategory</label>
              <select v-model="selected">
              <option disabled value="">Please select one</option>
              <option>Accv</option>
              <option>Bvvv</option>
              <option>Cvv</option>
            </select>
            </div>
            <div class="row mb-3">
              <label class="form-label">ChildSubCAtegory</label>
              <select v-model="selected">
              <option disabled value="">Please select one</option>
              <option>Accv</option>
              <option>Bvvv</option>
              <option>Cvv</option>
            </select>
            </div>
            
            <div class="card-body pt-0">
            <label class="form-label">Attachment</label><br />
            <soft-image-input id="pfp" ref="pfp" @added-image="addedImage" />

            <soft-button
              v-if="!file"
              size="sm"
              color="warning"
              @click="$refs.pfp.click()"
              >Select</soft-button>
            <validation-error :errors="apiValidationErrors.profile_image" />
          </div>
          </div>
        </div>
      </div>
      <div class="row container-fluid">
              <label class="form-label">Description</label>
            <textarea placeholder="add desciption" ></textarea>
            <input type="hidden" value="random_number" name="ticket_number">
          </div>
      <div>
        <soft-button
          class="float-end mt-6 mb-0"
          color="warning"
          variant="gradient"
          size="sm"
          :is-disabled="loading2 ? true : false"
          @click="handleProfileChange"
          ><span
            v-if="loading2"
            class="spinner-border spinner-border-sm"
          ></span
          ><span v-else>Save</span></soft-button
        >
      </div>
    </div>
  </div>
</template>

<script>
import SoftButton from "@/components/SoftButton.vue";
import SoftSwitch from "@/components/SoftSwitch.vue";
import SoftAvatar from "@/components/SoftAvatar.vue";
import SoftModelInput from "@/components/SoftModelInput.vue";
import ValidationError from "@/components/ValidationError.vue";
import formMixin from "../mixins/form-mixin.js";
import img from "@/assets/img/bruce-mars.jpg";
import showSwal from "@/mixins/showSwal.js";

export default {
  name: "Profile",
  components: {
    SoftButton,
    SoftSwitch,
    SoftAvatar,
    SoftModelInput,
    ValidationError,
  },
  mixins: [formMixin],
  data() {
    const passChange = {
      password: "",
      password_confirmation: "",
    };
    const profileChange = {
      name: "",
      email: "",
      profile_image: "",
    };
    return {
      passChange,
      profileChange,
      loading: false,
      loading2: false,
      img,
    };
  },
  computed: {
    profile() {
      return this.$store.getters["profile/profile"];
    },
    pic() {
      if (this.profile.profile_image) return this.profile.profile_image;
      else return require("/assets/img/placeholder.jpg");
    },
  },
  async created() {
    try {
      await this.$store.dispatch("profile/getProfile");
      this.profileChange = { ...this.profile };
    } catch (error) {
      try {
        await this.$store.dispatch("auth/logout");
      } finally {
        this.$router.push("/login");
      }
    }
  },
  methods: {
    async handlePassChange() {
      if (this.profile.id <= 3) {
        showSwal.methods.showSwal({
          type: "error",
          message: "You cannot change data of default users!",
          width: 450,
        });
        return;
      }
      this.resetApiValidation();
      this.loading = true;

      try {
        await this.$store.dispatch("profile/updateProfile", this.passChange);
        showSwal.methods.showSwal({
          type: "success",
          message: "Password changed successfully!",
          width: 500,
        });
        this.passChange.password = "";
        this.passChange.password_confirmation = "";
        this.loading = false;
      } catch (error) {
        this.setApiValidation(error.response.data.errors);
        this.loading = false;
      }
    },

    async handleProfileChange() {
      if (this.profile.id <= 3 && (process.env.VUE_APP_IS_DEMO ?? 1) == 1) {
        showSwal.methods.showSwal({
          type: "error",
          message: "You cannot change data of default users!",
          width: 450,
        });
        return;
      }

      this.resetApiValidation();
      this.loading2 = true;

      try {
        await this.$store.dispatch("profile/updateProfile", this.profileChange);
        showSwal.methods.showSwal({
          type: "success",
          message: "Profile updated successfully!",
          width: 600,
        });
        this.loading2 = false;
      } catch (error) {
        console.log(error);
        this.setApiValidation(error.response.data.errors);
        this.loading2 = false;
      }
    },
  },
};
</script>
<style>
img {
  object-fit: cover;
}
</style>
