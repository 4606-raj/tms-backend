<template>
  <div class="py-4 container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
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
          <div class="px-0 pb-0 card-body">
            <table id="users-list" ref="usersList" class="table table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Service</th>
                   <th>Profile</th>
                    <th>Created At</th>
                    <th>Status</th>
                   <th>Action</th>
                 </tr>
                </thead>
                <tbody class="text-sm">
                  <tr>
                   <td>Admin</td>
                    <td>admin@jsonapi.com</td>
                    <td>6785986666</td>
                    <td>XYZ</td>
                   <td>Role_set</td>
                    <td>2023-01-16</td>
                    <td>Active</td>
                   <td>
                      <a
                        @click="alert"
                        id="1"
                        class="actionButton cursor-pointer me-3"
                        data-bs-toggle="tooltip"
                        title="Edit User"
                      >
                        <i class="fas fa-user-edit text-secondary"></i> </a
                      ><a
                        @click="alert"
                        id="2"
                       class="actionButton deleteButton cursor-pointer"
                       data-bs-toggle="tooltip"
                        title="Delete User"
                      >
                        <i class="fas fa-trash text-secondary"></i>
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
          </div>
          <div
            class="d-flex justify-content-center justify-content-sm-between flex-wrap"
            style="padding: 24px 24px 0px"
          >
            <div>
              <p>Showing 1 to 1 of 1 entries</p>
            </div>
            <ul class="pagination pagination-success pagination-md">
              <li class="page-item prev-page disabled">
                <a class="page-link" aria-label="Previous">
                  <span aria-hidden="true"
                    ><i class="fa fa-angle-left" aria-hidden="true"></i
                  ></span>
                </a>
              </li>
              <li class="page-item disabled active">
                <a class="page-link" style="color: white">1</a>
              </li>
              <li class="page-item next-page disabled">
                <a class="page-link" aria-label="Next">
                  <span aria-hidden="true"
                    ><i class="fa fa-angle-right" aria-hidden="true"></i
                  ></span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import showSwal from "../mixins/showSwal.js";
export default {
  name: "Users",
  components: {
  
    //BasePagination,
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
