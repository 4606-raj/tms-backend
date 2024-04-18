<template>
  <div class="py-4 container-fluid">
    <div class="row">
        <div class="card-header pb-0 text-center">
          <h3 class="font-weight-bolder text-warning text-gradient pt-5">
           Contact Channels</h3>
        </div>
      <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
        <mini-statistics-card
          title="Grievance Email Id"
          value="test-test@gmail.com"
          :icon="{
            component: ' ni ni-email-83',
            background: iconBackground,
          }"
          direction-reverse
        />
      </div>
      <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
        <mini-statistics-card
          title="Helpline"
          value="0171-4880500 
          *9:00 AM - 6:00 PM (Monday to Saturday)"
          :icon="{
            component: ' ni ni-headphones',
            background: iconBackground,
          }"
          direction-reverse
        />
      </div>
      <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
        <mini-statistics-card
          title="Office Address"
          value="Plot No. C-160,
           CIP, Sector 17, 
           city – 165055"
          :icon="{
            component: 'ni ni-customer-support',
            background: iconBackground,
          }"
          direction-reverse
        />
      </div>
    
    </div>
 
    
  </div>
</template>
<script>
import MiniStatisticsCard from "@/examples/Cards/MiniStatisticsCard.vue";
import {
  faHandPointer,
  faUsers,
  faCreditCard,
  faScrewdriverWrench,
} from "@fortawesome/free-solid-svg-icons";
export default {
  name: "dashboard-default",
  data() {
    return {
      iconBackground: "bg-gradient-warning",
      faCreditCard,
      faScrewdriverWrench,
      faUsers,
      faHandPointer,
    };
  },
  mounted() {
    // fetch('http://127.0.0.1:8001/api/test');
  },
  components: {
    MiniStatisticsCard,
  },
};
</script>
