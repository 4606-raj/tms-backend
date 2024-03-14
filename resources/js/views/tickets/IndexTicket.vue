<template>
    <div class="py-4 container-fluid">
      <div class="row">
        <div class="col-12">
          <soft-table :headers="tableHeaders" :data="tableData"/>
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
        tableData: [],
      }
    },
    async mounted() {
      await this.fetchData();
    },
    methods: {
      async fetchData() {
        try {

          await this.$store.dispatch('tickets/fetchAll')

          this.tableData = this.$store.getters['tickets/getAll']
          this.tableData = this.tableData.map(({ name, email, mobile }) => ({ name, email, mobile }))
          
        } catch (error) {
          console.error('Error fetching data:', error);
        }

      }
    }
    
  };
  </script>
  