<template>
  <div class="container-fluid mt-4">
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
                name="name"
                v-model="ticket.name" 
                type="text"
                placeholder="Alec"
              />
              <validation-error :errors="apiValidationErrors.name" />
            </div>

            <div class="row mb-3">
              <label class="form-label mt-2">Applicant Email</label>
              <soft-model-input
                id="email"
                name="email"
                v-model="ticket.email"
                type="email"
                placeholder="example@email.com"
              />
              <validation-error :errors="apiValidationErrors.email" />
            </div>
            <div class="row mb-3">
              <label class="form-label mt-2">Applicant Mobile</label>
              <soft-model-input
                id="mobile"
                name="mobile"
                v-model="ticket.moblie"
                type="text"
                placeholder="6789534687"
              />
              <validation-error :errors="apiValidationErrors.mobile" />
            </div> 
            <div class="row mb-3">
              <label class="form-label mt-2">Applicant FamilyId</label>
              <soft-model-input
                id="familyId"
                name="family_id"
                v-model="ticket.familyId"
                type="text"
                placeholder="7865RT66"
              />
              <validation-error :errors="apiValidationErrors.familyId" />
            </div>
            <div class="mb-3">
              <label class="form-label">District</label>
              <select class="form-select" name="district" v-model="ticket.district">
              <option disabled selected value="">Please select one</option>
              <option>Accv</option>
              <option>Bvvv</option>
              <option>Cvv</option>
            </select>
            </div>
            <div class="row mb-3">
              <soft-checkbox
                id="flexCheckDefault"
                name="auto_close"
                v-model="ticket.auto_close"
                class="font-weight-light"
                checked
              >Auto Close </soft-checkbox>
              
              
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
            <div class="mb-3">
              <label class="form-label">Type:</label>
              <select class="form-select" name="type" v-model="ticket.type">
              <option disabled selected value="">Please select one</option>
              <option value="all">All</option> 
              <option value="query">Query</option>
              <option value="modification">Modification</option>
            </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Source</label>
              <select class="form-select" name="source"v-model=ticket.source>
              <option disabled selected value="">Please select one</option>
              <option value="2">Accv</option>
              <option value="3">Bvvv</option>
              <option value="'4'">Cvv</option>
            </select>
            </div>

            <div class="mb-3">
              <label class="form-label">Channel</label>
              <select class="form-select" name="channel" v-model="ticket.channel">
              <option disabled selected value="">Please select one</option>
              <option value="1">Accv</option>
              <option value="2">Bvvv</option>
              <option value="3">Cvv</option>
            </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Category</label>
              <select class="form-select" name="category_id" v-model="ticket.category_id">
              <option disabled selected value="">Please select one</option>
              <option value="1">Accv</option>
              <option value="1">Bvvv</option>
              <option value="1">Cvv</option>
            </select>
            </div>
            <div class="mb-3">
              <label class="form-label">SubCategory</label>
              <select class="form-select"name="sub_category_id" v-model="ticket.sub_category_id">
              <option disabled selected value="">Please select one</option>
              <option value="1">Accv</option>
              <option value="1">Bvvv</option>
              <option value="1">Cvv</option>
            </select>
            </div>
            <div class="mb-3">
              <label class="form-label">ChildSubCAtegory</label>
              <select class="form-select" name="child_sub_category_id" v-model="ticket.child_sub_category_id">
              <option disabled selected value="">Please select one</option>
              <option value="1">Accv</option>
              <option value="1">Bvvv</option>
              <option value="1">Cvv</option>
            </select>
            </div>
            
            <div class="card-body pt-0">
            <label class="form-label">Attachment</label><br />
            <input type="file" name="attachment" >
          </div>
          </div>
        </div>
      </div>
      <div class="row container-fluid">
              <label class="form-label">Description</label>
            <textarea placeholder="add desciption" name="description" v-model="ticket.description"></textarea>
            <!-- <input type="hidden" value="random_number" name="ticket_number"> -->
          </div>
      <div>
        <soft-button
          class="float-end mt-6 mb-0"
          color="warning"
          variant="gradient"
          size="sm"
          :is-disabled="loading ? true : false"
          @click="createTicket"
          ><span
            v-if="loading"
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
import formMixin from "../../mixins/form-mixin.js";
import img from "@/assets/img/bruce-mars.jpg";
import showSwal from "@/mixins/showSwal.js";
import SoftCheckbox from "@/components/SoftCheckbox.vue";

import { mapMutations } from "vuex";
import axios from '@/axios-config';

export default {
  name: "Profile",
  components: {
    SoftButton,
    SoftSwitch,
    SoftAvatar,
    SoftModelInput,
    ValidationError,
    SoftCheckbox,
  },
  mixins: [formMixin],
  data() {
    return {
      ticket: {
        name: '',
        email: '',
        familyId: '',
        mobile:'',
        district: '',
        auto_close: '',
        category_id: '',
        sub_category_id:'',
        child_sub_category_id:'',
        channel:'',
        source:'',
        type:'',
        description:'',
        
      },

      loading: false,
    };
  },
  
  methods: {
    async createTicket() {
      try {
        await this.$store.dispatch("tickets/createTicket", this.ticket);
            
        showSwal.methods.showSwal({
          type: "success",
          message: "Ticket created successfully!",
          width: 500,
        });
        this.loading = false;
      } catch (error) {
        this.setApiValidation(error.response.data.errors);
        this.loading = false;
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
