<template>
  <div class="container-fluid mt-4">
    <div class="row">
     
        <div class="col-4">
          <div id="basic-info" class="card mt-4">
            <div class="card-header">
              <h5>Citizen Information</h5>
            </div>


            <div class="card-body pt-0">
              <div class="row mb-3">
                <label class="form-label">Applicant Name</label>
                <soft-model-input
                  id="name"
                  name="name"
                  v-model="ticket.name" 
                  type="text"
                />
              </div>

              <div class="row mb-3">
                <label class="form-label mt-2">Applicant Email</label>
                <soft-model-input
                  id="email"
                  name="email"
                  v-model="ticket.email"
                  type="email"
                />
              </div>
              <div class="row mb-3">
                <label class="form-label mt-2">Applicant Mobile</label>
                <soft-model-input
                  id="mobile"
                  name="mobile"
                  v-model="ticket.mobile"
                  type="text"
                />
              </div> 
              <div class="row mb-3">
                <label class="form-label mt-2">Applicant FamilyId</label>
                <soft-model-input
                  id="familyId"
                  name="family_id"
                  v-model="ticket.family_id"
                  type="text"
                />
              </div>
              <div class="mb-3">
                <label class="form-label">District</label>
                <select class="form-select" name="district" v-model="ticket.district">
                <option disabled selected value="">Please select one</option>
                <option v-for="item in district" :value="item.id" :key="item.id">{{ item.name }}</option>
              </select>
              </div>
            </div>

          
          </div>
        </div>

        <div class="col-8">
          <div id="password" class="card mt-4">
            <div class="card-header">
              <h5>User Info</h5>
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
                <option v-for="item in sources" :value="item.id" :key="item.id">{{ item.name }}</option>
              </select>
              </div>

              <div class="mb-3">
                <label class="form-label">Channel</label>
                <select class="form-select" name="channel" v-model="ticket.channel">
                <option disabled selected value="">Please select one</option>
                <option v-for="item in channels" :value="item.id" :key="item.id">{{ item.name }}</option>
              </select>
              </div>
              <div class="mb-3">
                <label class="form-label">Category</label>
                <select class="form-select" name="category_id" v-model="ticket.category_id">
                  <option disabled value="">Please select one</option>
                  <option value="1" >Management</option>
                  <option value="2" >Technical</option>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label">SubCategory</label>
                <select class="form-select"name="sub_category_id" v-model="ticket.sub_category_id"  @change="getSubcategories">
                <option disabled selected value="">Please select one</option>
                <option v-for="item in categories" :value="item.id" :key="item.id">{{ item.name }}</option>
              </select>
              </div>
              <div class="mb-3">
                <label class="form-label">ChildSubCategory</label>
                <select class="form-select"name="child_sub_category_id" v-model="ticket.child_sub_category_id">
                <option disabled selected value="">Please select one</option>
                <option v-for="item in subcategories" :value="item.id">{{ item.name }}</option>
              </select>
              </div>
            </div>
          </div>
        </div>
        
        <div class="row container-fluid card mt-4">
            <label class="form-label">Description</label>
            <textarea placeholder="add desciption" name="description" v-model="ticket.description"></textarea>
            <soft-ckeditor
              id="flexdescriptionDefault"
              name="description"
              v-model="ticket.description"
              class="font-weight-light"
              placeholder =ck description
            ></soft-ckeditor>  
        </div>

        <div>
          <soft-button
            class="float-end mt-6 mb-0"
            color="warning"
            variant="gradient"
            size="sm"
            :is-disabled="loading ? true : false"
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
import SoftModelInput from "@/components/SoftModelInput.vue";
import ValidationError from "@/components/ValidationError.vue";
import formMixin from "../../mixins/form-mixin.js";
import SoftCheckbox from "@/components/SoftCheckbox.vue";
import SoftCkeditor from "@/components/SoftCkeditor.vue";

export default {
  name: "ShowTicket",
  components: {
    SoftButton,
    SoftSwitch,
    SoftModelInput,
    ValidationError,
    SoftCkeditor,
  },

  mixins: [formMixin],

  mounted() {
    //this.$store.dispatch("tickets/fetchAll");
  },

  computed: {
   
  },

  data() {
    return {
      
    };
  },
  
  methods: {
    async handleSubmit() {
      await this.$store.dispatch("tickets/createTicket", this.ticket);
    },
  },
};

</script>

<style>
  img {
    object-fit: cover;
  }
</style>
