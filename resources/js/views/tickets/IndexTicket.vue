<template>
    <div class="py-4 container-fluid">
      <div class="row">
        <div class="col-12">

          <router-link class="btn bg-gradient-warning btn-sm" :to="{name: 'CreateTicket'}">Create Ticket</router-link>
          
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
          'ticket_number','name(mobile)', 'email', 'mobile','familyid','category','subcategory','childsubcategory','Assignto','district','status','channel','loggedby','loggedat','resolveddate'
        ],
      }
    },
    async mounted() {
      this.fetchData();
    },
    computed: {
      tickets() {
        const allTickets = this.$store.getters['tickets/getAll'];
        return allTickets.map(({ ticket_number, name_mob, email, mobile, family_id, category_name, subcategory_name, chidsubcategory_name, assign_to, district_name,auto_close,channel,user_id,created_at,resolved_date  }) => ({ ticket_number, name_mob, email, mobile, family_id, category_name, subcategory_name, chidsubcategory_name, assign_to, district_name,auto_close,channel,user_id,created_at,resolved_date }))
      },
      pagination() {
        return this.$store.getters['tickets/getPagination'];
      }
    },
    methods: {
      fetchData() {
        this.$store.dispatch('tickets/fetchAll', {page: this.pagination?.current_page})
      },

      changePage(page) {

        if(page < 1 || page > this.pagination?.last_page) return;
        
        this.pagination.current_page = page;
        this.fetchData()
      }

    }
    
  };
  </script>
  