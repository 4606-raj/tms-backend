<template>
    <div class="py-4 container-fluid">
      <div class="row px-0 pt-0 pb-2">
        <div class="col-12 ">
            <div class="col-4">
              <label class="form-label">search By: </label>
              <select class="form-select" name="search">
                  <option disabled selected value="">Please select one</option>
                  <option value="familyId">FamilyId</option>
                  <option value="mobile_number">Mobile Number</option>
                  <option value="ticket_number">Ticket Number</option> 
              </select>
            </div>
            <div class="col-4">
              <label class="form-label">Value</label>
              <soft-model-input
                id="value"
                type="text"
                placeholder="Enter value"
              />
            </div>
            <div class="col-4">
              <soft-button
                color="warning"
                variant="gradient"
                class="float-end mt-6 mb-0"
                size="sm"
                :is-disabled="loading ? true : false"
                @click="handlePassChange"
                ><span
                  v-if="loading"
                  class="spinner-border spinner-border-sm"
                ></span>
                <span v-else>SEARCH</span></soft-button
              >
            </div>
          </div>
      </div>
      <div class="row">
        <div class="col-12">
          <router-link class="btn bg-gradient-warning btn-sm" :to="{name: 'CreateTicket'}">Create Ticket</router-link>
          <div class="table-responsive">
            <soft-table :headers="tableHeaders" :data="tickets"/>
            <div class="pagination justify-content-end">
            <soft-pagination color="primary" v-if="pagination != null">
              <soft-pagination-item label="<" 
              @click="changePage(pagination.current_page - 1)" 
              :disabled="pagination.current_page === 1" />
              
              <soft-pagination-item v-for="page in pagination.last_page" 
              :label="page.toString()" 
              :class="{ active: pagination.current_page === page }" 
              @click="changePage(page)"
              />
              
              <soft-pagination-item label=">" 
                @click="changePage(pagination.current_page + 1)" 
                :disabled="pagination.current_page >= pagination.last_page" />
              </soft-pagination>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
import SoftTable from "../components/SoftTable.vue";
import SoftPagination from "../components/SoftPagination.vue";
import SoftPaginationItem from "../components/SoftPaginationItem.vue";

export default {
  name: "IndexTicket",
  components: {
    SoftTable,
    SoftPagination,
    SoftPaginationItem,
  },

  data() {
    return {
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
      return allTickets.map(({ ticket_number, name, email, mobile, family_id, category, sub_category, child_subcategory, assign_to, districts, auto_close, channels, users, created_at, resolved_date }) => ({
        ticket_number,
        name_mob: `${name} - ${mobile}`,
        email,
        mobile,
        family_id,
        category_name: category.name,
        subcategory_name: sub_category.name,
        chidsubcategory_name: child_subcategory.name,
        assign_to : users.name,
        district_name: districts.name,
        auto_close: auto_close === '0' ? 'Open' : 'close',
        channel: channels.name,
        logged: users.name,
        created_at: this.formatDate(created_at),
        resolved_date
      }))
    },
    pagination() {
      return this.$store.getters['tickets/getPagination'];
    }
  },
  methods: {

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
    }

  }

};
</script>

  