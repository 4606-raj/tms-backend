<template>
  <div class="py-4 container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="">
          <!-- Card header -->
          <div class="pb-0 card-header">
            <div class="d-lg-flex">
              <div>
                <h5 class="mb-0">Users List</h5>
              </div>
              <div class="my-auto mt-4 ms-auto mt-lg-0">
                <div class="my-auto ms-auto">
                  <!-- <a @click="alert" class="mb-0 btn bg-gradient-warning btn-sm"
                    >+&nbsp; New User</a
                  > -->
                  <router-link class="mb-0 btn bg-gradient-warning btn-sm" :to="{name: 'Sign Up'}">+&nbsp; New User</router-link>
                </div>
              </div>
            </div>
          </div>
          <div class="px-0 pb-0">

            <soft-table :headers="tableHeaders" :data="users"/>

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
          <div
            class="d-flex justify-content-center justify-content-sm-between flex-wrap"
            style="padding: 24px 24px 0px"
          >
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import showSwal from "../mixins/showSwal.js";
import SoftTable from "./components/SoftTable.vue";
import SoftPagination from "./components/SoftPagination.vue";
import SoftPaginationItem from "./components/SoftPaginationItem.vue";
export default {
  name: "Users",
  components: {
    SoftTable,
    SoftPagination,
    SoftPaginationItem,
  },
  data() {
    return {
      tableHeaders: [
        'Name', 'email', 'mobile', 'Services', 'Profile', 'CreatedAt', 'status'
      ],
    }
  },
  async mounted() {
    this.fetchData();
  },
  computed: {
    users() {
      const allUsers = this.$store.getters['users/getAll'];
      if (!allUsers || !Array.isArray(allUsers)) {
        console.error('User LIst is not properly initialized or is not an array.');
        return [];
      }
      return allUsers.map(({ name, email, mobile, service, profile, created_at, status }) => ({
        name,
        email,
        mobile,
        service,
        profile,
        created_at: this.formatDate(created_at),
        status: status === '1' ? 'Active' : 'Deactive',
      }))
    },
    pagination() {
      return this.$store.getters['users/getPagination'];
    }
  },

  methods: {
    formatDate(dateString) {
      const date = new Date(dateString);
      return date.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
    },
    fetchData() {
        // Check if pagination object exists before accessing its properties
        if (this.pagination && this.pagination.current_page) {
          this.$store.dispatch('users/fetchAll', { page: this.pagination.current_page });
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
  },
};
</script>
<style>
td {
  padding: 12px 24px !important;
}
</style>
