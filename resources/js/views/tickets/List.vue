<template>
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
</template>

<script>
import SoftTable from "../components/SoftTable.vue";
import SoftPagination from "../components/SoftPagination.vue";
import SoftPaginationItem from "../components/SoftPaginationItem.vue";

export default {
    name: "List",
    props: {
        tickets: {
            type: Array,
            required: true,
        }
    },
    components: {
        SoftTable,
        SoftPagination,
        SoftPaginationItem,
    },
    async mounted() {
        // this.fetchData();
    },
    computed: {
        pagination() {
            return this.$store.getters['tickets/getPagination'];
        }
    },

};
</script>