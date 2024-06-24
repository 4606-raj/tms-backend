<template>  
    <div class="py-4 container-fluid">
      <!---start filter section-->
      <div class="row px-0 pt-0 pb-2">
        <h5>Ticket's Filters</h5>
        <div class="col-12 row">
          <div class="col-3">
            <label class="form-label">Type: </label>
            <select class="form-select" name="type" v-model="formdata.type">
              <option disabled selected value="">Please select one</option>
              <option value="all">All</option> 
              <option value="query">Query</option>
              <option value="modification">Modification</option>
            </select>
          </div>
          <div class="col-3">
            <label class="form-label">Created BY: </label>
            <select class="form-select" name="created_by" v-model="formdata.created_by">
              <option disabled selected value="">Please select one</option>
              <option value="all">All</option> 
              <option value="operator">Operator</option>
              <option value="modification">Modification</option>
            </select>
          </div>
          <div class="col-3">
              <label class="form-label">Start Date</label>
              <input
                id="start_date"
                type="text"
                class="form-control"
                placeholder="DD-MM-YY"
                v-model="formdata.start"
              />
          </div>
          <div class="col-3">
              <label class="form-label">End Date</label>
              <input
                id="end_date"
                type="text"
                class="form-control"
                placeholder="DD-MM-YY"
                v-model="formdata.end"
              />
          </div>
        </div>
        <div class="col-12 row">
          <div class="col-3">
            <label class="form-label">Status: </label>
            <select class="form-select" name="status" v-model="formdata.status">
              <option disabled selected value="">Please select one</option>
              <option value="all">All</option> 
              <option value="open">Open</option>
              <option value="close">close</option>
              <option value="resolved">resolved</option>
            </select>
          </div>
          <div class="col-3">
            <label class="form-label">Category: </label>
            <select class="form-select" name="category" v-model="formdata.category">
              <option disabled selected value="">Please select one</option>
              <option value="all">All</option> 
              <option value="operator">Operator</option>
              <option value="modification">Modification</option>
            </select>
          </div>
          <div class="col-3">
            <label class="form-label">Subcategory: </label>
            <select class="form-select" name="subcategory" v-model="formdata.subcategory">
              <option disabled selected value="">Please select one</option>
              <option value="all">All</option> 
              <option value="operator">Operator</option>
              <option value="modification">Modification</option>
            </select>
          </div>
          <div class="col-3">
            <label class="form-label">ChildSubcategory: </label>
            <select class="form-select" name="childsubcategory" v-model="formdata.childsubcategory">
              <option disabled selected value="">Please select one</option>
              <option value="all">All</option> 
              <option value="operator">Operator</option>
              <option value="modification">Modification</option>
            </select>
          </div>
        </div>
        <div class="col-12 row">
          <div class="col-3">
            <label class="form-label">District: </label>
            <select class="form-select" name="district" v-model="formdata.district">
              <option disabled selected value="">Please select one</option>
              <option value="all">All</option> 
              <option value="1">sonipat</option>
              <option value="2">panipat</option>
            </select>
          </div>
          <div class="col-3">
            <label class="form-label">Assign To: </label>
            <select class="form-select" name="assign" v-model="formdata.assign_to">
              <option disabled selected value="">Please select one</option>
              <option value="all">All</option> 
              <option value="DCRIM">DCRIM</option>
              <option value="ZCRIM">ZCRIM</option>
            </select>
          </div>
          <div class="col-3">
            <label class="form-label">Assign User: </label>
            <select class="form-select" name="assign" v-model="formdata.assign_user">
              <option disabled selected value="">Please select one</option>
              <option value="all">All</option> 
              <option value="1">ABC</option>
              <option value="2">BCD</option>
            </select>
          </div>
          <div class="col-3 d-flex justify-content-end">
            <soft-button color="warning" variant="gradient" class="btn bg-gradient-info btn-sm mt-4 me-2"
                size="sm" :is-disabled="loading ? true : false">
                <span v-if="loading" class="spinner-border spinner-border-sm"></span>
                <span v-else>SEARCH</span>
            </soft-button>
            <soft-button class="btn bg-gradient-primary btn-sm mt-4" @click="resetForm">
                <span>Clear</span>
            </soft-button>
          </div>
        </div>
      </div>
      <!---end filter section-->

      <div class="col-12">

        <router-link class="btn bg-gradient-warning btn-sm mt-4" :to="{name: 'CreateTicket'}" v-if="hasPermission('create_ticket')">Create Ticket</router-link>
        <!-- <soft-button class="float-end btn bg-gradient-primary btn-sm mt-4" @click="downloadExcel"><i class="fa fa-download" aria-hidden="true"></i></soft-button> -->
        <soft-button class="float-end btn bg-gradient-dark btn-sm mt-4" @click="AssinedTicketExcel">
        <span>Download Assigned Ticket</span></soft-button>
        <router-link class="float-end btn bg-gradient-light btn-sm mt-4" :to="{name: 'CreateTicket'}">Assigned Ticket</router-link>
      </div>
      
      <div class="row col-12">

        <div class="col-12">
          <list :tableHeaders="tableHeaders" :tickets="tickets"/>
        </div>
      </div>
    </div>
  </template>
  
  <script>

// import List from "./List.vue";
import List from "@/views/tickets/List.vue";
import SoftButton from "@/components/SoftButton.vue";

export default {
  name: "IndexTicket",
  components: {
    List,
    SoftButton
  },
  data() {
    return {
      loading: false,
      formdata: {
        type: '',
        created_by: '',
        start: '',
        end:'',
        status: '',
        district: '',
        category: '',
        subcategory:'',
        childsubcategory:'',
        assign_to:'',
        assign_user:'',
      },
      tableHeaders: [
        'ticketnumber', 'name(mobile)', 'email', 'mobile', 'familyid', 'category', 'subcategory', 'childsubcategory', 'Assignto', 'district', 'status', 'channel', 'loggedby', 'loggedat', 'resolveddate'
      ],
    }
  },
  async mounted() {
    this.fetchData();
  },
  computed: {
    tickets() {
      const allTickets = this.$store.getters['tickets/getAll'];
      if (!allTickets || !Array.isArray(allTickets)) {
        console.error('Tickets data is not properly initialized or is not an array.');
        return [];
      }
      let tickets = allTickets.map((ticket) => ({
        ticket_number: ticket.ticket_number,
        name_mob: `${ticket.name} - ${ticket.mobile}`,
        email: ticket.email,
        mobile: ticket.mobile,
        family_id: ticket.family_id,
        category_name: ticket.category.name,
        subcategory_name: ticket.sub_category.name,
        chidsubcategory_name: ticket.child_subcategory.name,
        assign_to : ticket.users.name,
        district_name: ticket.districts.name,
        auto_close: ticket.auto_close === '0' ? 'Open' : 'close',
        channel: ticket.channels.name,
        logged: ticket.users.name,
        created_at: this.formatDate(ticket.created_at),
        resolved_date: ticket.resolved_date,
        // action: 'view'
      }))
      tickets.actions = ['view']
      return tickets
    },
    permissions() {
      return this.$store.getters["auth/getPermissions"];
    },
    pagination() {
      return this.$store.getters['tickets/getPagination'];
    }
  },
  methods: {
    resetForm() {
      this.formdata = ''; // Reset the input field value
    },

    formatDate(dateString) {
    // Assuming dateString is in ISO format like "YYYY-MM-DDTHH:MM:SSZ"
      const date = new Date(dateString);
      return date.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
    },
    fetchData() {
      // Check if pagination object exists before accessing its properties
      if (this.pagination && this.pagination.current_page) {
        this.$store.dispatch('tickets/fetchAll', { page: this.pagination.current_page });
      } else {
        // Handle the case where pagination object is not initialized
        console.error('Pagination object is null or undefined');
      }
    },
    changePage(page) {
      if (page < 1 || page > this.pagination.last_page) return;

      this.pagination.current_page = page;
      this.fetchData()
    },
    hasPermission(value) {
      return this.permissions?.includes(value);
    },
    AssinedTicketExcel() {
      
    }

  }

};
</script>

  