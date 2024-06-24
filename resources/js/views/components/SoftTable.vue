<template>
  <div class="card mb-4">
    <div class="card-header pb-0">
      <h6>{{ heading ?? 'List' }}</h6>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
      <div class="table-responsive p-0">
        <table class="table align-items-center mb-0 table-striped">
          <thead>
            <tr>
              <th v-for="header in headers" class="text-uppercase text-secondary text-m font-weight-bolder opacity-10">
                {{ header }}
              </th>
              <th v-if="data && data.length && data['actions'] && data['actions'].includes('view')">
               Action
            </th>
              
              <!-- <th class="text-secondary opacity-7"></th> -->
            </tr>
          </thead>
          <tbody>
            <tr v-for="item in data" v-if="data && data.length">
              <td v-for="value in item">
                <p class="text-s font-weight-bold mb-0">{{ value }}</p>
              </td>
              <td v-if="data && data.length && data['actions'] && data['actions'].includes('view')">
                <router-link :to="{name: 'TicketDetail', params: { id: item.ticket_number }}">
                  <soft-button>View</soft-button>
                </router-link>
              </td>
            </tr>
            <tr v-else>
              <td :colspan="headers.length"><h3>No data to display</h3></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import SoftAvatar from "@/components/SoftAvatar.vue";
import SoftBadge from "@/components/SoftBadge.vue";
import img1 from "../../assets/img/team-2.jpg";
import SoftButton from "@/components/SoftButton.vue";

export default {
  name: "soft-table",
  data() {
    return {
      img1,
    };
  },
  components: {
    SoftAvatar,
    SoftBadge,
    SoftButton,
  },

  props: {
    headers: {
      type: Array,
      required: true
    },
    data: {
      type: Array,
      required: true
    },
    heading: {
      type: String,
      required: false
    },
  },
  mounted() {
    // console.log(this.data);
  }
  
};
</script>
