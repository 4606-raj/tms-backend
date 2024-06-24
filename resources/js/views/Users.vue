<template>
  <div class="py-4 container-fluid">
    <div class="row px-0 pt-0 pb-2">
      <div class="col-12 row d-flex align-items-center ">

        <form id="search-form" class="d-flex align-items-center gap-5" @submit.prevent="handleSearchForm">
        
          <div class="col-4">
            <label class="form-label">Search By: </label>
            <select class="form-select" name="search" v-model="searchBy">
              <option disabled selected value="">Choose Search Type</option>
              <option value="name">Name</option>
              <option value="email">Email Id</option> 
              <option value="mobile">Mobile Number</option> 
            </select>
          </div>
          <div class="col-4">
            <label class="form-label">Value</label>
            <input
                id="value"
                name="value"
                type="text"
                class="form-control"
                placeholder="enter search value here"
                v-model="searchValue"
            />
          </div>
          <div class="col-4">
            <soft-button
              color="warning"
              variant="gradient"
              class="float-start btn bg-gradient-info btn-sm mt-4"
              size="sm"
              :is-disabled="loading ? true : false"
              type="submit"
              ><span
                v-if="loading"
                class="spinner-border spinner-border-sm"
              ></span>
              <span v-else>SEARCH</span></soft-button
            >
            <!-- <soft-button
              color="info"
              variant="gradient"
              class="float-start btn bg-gradient-primary btn-sm mt-4"
              size="sm"
              type="reset"
              :is-disabled="loading ? true : false"
              @click="resetForm"
              ><span
                v-if="loading"
                class="spinner-border spinner-border-sm"
              ></span>
              <span v-else>Clear</span></soft-button
            > -->
          </div>

        </form>

      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="">
          <!-- Card header -->
          <div class="pb-0 card-header">
            <div class="d-lg-flex">
              <!-- <div>
                <h5 class="mb-0">Users List</h5>
              </div> -->
              <div class="my-auto mt-4 ms-auto mt-lg-0">
                <div class="my-auto ms-auto">
                  <!-- <a @click="alert" class="mb-0 btn bg-gradient-warning btn-sm"
                    >+&nbsp; New User</a
                  > -->
                  <router-link class="mb-0 btn bg-gradient-info btn-sm" :to="{name: 'UsersCreate'}">+&nbsp; New User</router-link>
                </div>
              </div>
            </div>
          </div>
          <div class="px-0 pb-0">

            <soft-table :headers="tableHeaders" :data="users" heading="Users List"/>

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
import SoftButton from "./components/SoftButton.vue";
import SoftPagination from "./components/SoftPagination.vue";
import SoftPaginationItem from "./components/SoftPaginationItem.vue";
export default {
  name: "Users",
  components: {
    SoftTable,
    SoftButton,
    SoftPagination,
    SoftPaginationItem,
  },
  data() {
    return {
      searchBy: '',
      searchValue: '',
      loading: false,
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
    fetchData(searchParams = []) {
        // Check if pagination object exists before accessing its properties
        if (this.pagination && this.pagination.current_page) {
          this.$store.dispatch('users/fetchAll', { page: this.pagination.current_page, params: searchParams });
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

    async handleSearchForm() {
        if (!this.searchBy || !this.searchValue) {
          alert("Please select a search criterion and enter a value.");
          return;
        }
        this.loading = true;
        try {
          const searchParams = {
            searchBy: this.searchBy,
            searchValue: this.searchValue
          };
          await this.fetchData(searchParams);
        } catch (error) {
          console.error("Error fetching data:", error);
        } finally {
          this.loading = false;
        }
    },
  },

};
</script>
<style>
td {
  padding: 12px 24px !important;
}
</style>
