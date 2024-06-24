<template>
    <div class="py-4 container-fluid">
      <div class="row px-0 pt-0 pb-2">
        <div class="col-12 row d-flex align-items-center ">
            <div class="col-4">
              <label class="form-label">search By: </label>
              <select  v-model="searchBy" class="form-select" name="search">
                  <option disabled selected value="">Please select one</option>
                  <option value="familyId">FamilyId</option>
                  <option value="mobile_number">Mobile Number</option>
                  <option value="ticket_number">Ticket Number</option> 
              </select>
            </div>
            <div class="col-4">
              <label class="form-label">Value</label>
              <input
                v-model="searchValue"
                id="value"
                name="value"
                type="text"
                class="form-control"
                placeholder="Enter value"
                />
            </div>
            <div class="col-4">
              <soft-button
                  color="warning"
                  variant="gradient"
                  class="float-start btn bg-gradient-info btn-sm mt-4"
                  size="sm"
                  :is-disabled="loading"
                  @click="handlePassChange"
                >
                  <span v-if="loading" class="spinner-border spinner-border-sm"></span>
                  <span v-else>SEARCH</span>
                </soft-button>
            </div>
          </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <soft-table :headers="tableHeaders" :data="tickets" heading="Tickets Found"/>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
import SoftTable from "../components/SoftTable.vue";
import SoftButton from "../components/SoftButton.vue";

export default {
  name: "SearchTicket",
  components: {
    SoftTable,
    SoftButton,
  },

  data() {
    return {
      searchBy: '',
      searchValue: '',
      loading: false,
      tableHeaders: [
        'ticket number', 'name mob', 'email', 'mobile', 'family id', 'category name', 'subcategory name', 'chidsubcategory name', 'assign to', 'district name', 'auto close', 'channel', 'logged', 'created at', 'resolved date'
      ],
      
    }
  },
  async mounted() {
    // this.fetchData();
  },
  computed: {
    tickets() {
      const searchTicket = this.$store.getters['tickets/searchTicket'];
      if (!searchTicket || !Array.isArray(searchTicket)) {
        console.error('Tickets data is not properly initialized or is not an array.');
        return ["No data found"];
      }
      return searchTicket.map(({ ticket_number, name, email, mobile, family_id, category, sub_category, child_subcategory, assign_to, districts, auto_close, channels, users, created_at, resolved_date }) => ({
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
    }
  },
  methods: {
    formatDate(dateString) {
      const date = new Date(dateString);
      return date.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
    },
    async handlePassChange() {
      if (!this.searchBy || !this.searchValue) {
        alert("Please select a search criterion and enter a value.");
        return;
      }
      this.loading = true;
      try {
        await this.fetchData();
      } catch (error) {
        console.error("Error fetching data:", error);
      } finally {
        this.loading = false;
      }
    },
    async fetchData() {
      const searchParams = {
        searchBy: this.searchBy,
        searchValue: this.searchValue
      };
      await this.$store.dispatch('tickets/search', searchParams);
    }
  }
};
</script>

  