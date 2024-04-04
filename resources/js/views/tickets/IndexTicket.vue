<template>
    <div class="py-4 container-fluid">
      <div class="row">
        <div class="col-12">

          <router-link class="btn bg-gradient-warning btn-sm" :to="{name: 'CreateTicket'}">Create Ticket</router-link>
          
          <soft-table :headers="tableHeaders" :data="tickets"/>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import SoftTable from "../components/SoftTable.vue";
  
  export default {
    name: "IndexTicket",
    components: {
      SoftTable,
    },

    data() {
      return {
        tableHeaders: [
          'name', 'email', 'phone'
        ],
      }
    },
    async mounted() {
      this.fetchData();
    },
    computed: {
      tickets() {
        const allTickets = this.$store.getters['tickets/getAll'];
        return allTickets.map(({ name, email, mobile }) => ({ name, email, mobile }))
      },
    },
    methods: {
      fetchData() {
        this.$store.dispatch('tickets/fetchAll')
      }
    }
    
  };
  </script>
  