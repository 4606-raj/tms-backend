<template>
  <div class="py-4 container-fluid">
    <div class="d-flex justify-content-center bg-gradient-info">
      <h3>Ticking Tool Dashboard</h3>
    </div>
 
   
    
    <div class="row my-4">
      <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
        <projects-card />
      </div>
      <div class="col-lg-4 col-md-6">
        <timeline-list
          class="h-100"
          title="All Ticket overview"
          description="<i class='fa fa-arrow-up text-success' aria-hidden='true'></i>
            <span class='font-weight-bold'>24%</span> this month"
        >
          <timeline-item
            color="info"
            icon="check-bold"
            title="Total Tickets"
            date-time="50000"
          />
          <timeline-item
            color="success"
            icon="check-bold"
            title="Resolved Tickets"
            date-time="25000"
          />
          <timeline-item
            color="danger"
            icon="check-bold"
            title="Pending Tickets"
            date-time="20000"
          />
          <timeline-item
            color="dark"
            icon="check-bold"
            title="Closed Tickets"
            date-time="5000"
          />
        </timeline-list>
      </div>
    </div>
       <!-- start tab -->
  <div class="container-fluid">
     <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="dcrim-tab" data-bs-toggle="tab" data-bs-target="#dcrim" type="button" role="tab" aria-controls="dcrim" aria-selected="true">DCRIM</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="process-tab" data-bs-toggle="tab" data-bs-target="#process" type="button" role="tab" aria-controls="process" aria-selected="false">PROCESS</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="technical-tab" data-bs-toggle="tab" data-bs-target="#technical" type="button" role="tab" aria-controls="technical" aria-selected="false">TECHNICAL</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="zcrim-tab" data-bs-toggle="tab" data-bs-target="#zcrim" type="button" role="tab" aria-controls="zcrim" aria-selected="false">ZCRIM</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="dcrim" role="tabpanel" aria-labelledby="dcrim-tab">
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Status</th>
          <th>Details</th>
        </tr>
      </thead>
      <tbody>
        <tr >
          <td>1 </td>
          <td>name </td>
          <td>status</td>
          <td>details</td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="tab-pane fade" id="process" role="tabpanel" aria-labelledby="process-tab">
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Status</th>
          <th>Details</th>
        </tr>
      </thead>
      <tbody>
        <tr >
          <td>1 </td>
          <td>name </td>
          <td>status</td>
          <td>details</td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="tab-pane fade" id="technical" role="tabpanel" aria-labelledby="technical-tab">
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Status</th>
          <th>Details</th>
        </tr>
      </thead>
      <tbody>
        <tr >
          <td>1 </td>
          <td>name </td>
          <td>status</td>
          <td>details</td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="tab-pane fade" id="zcrim" role="tabpanel" aria-labelledby="zcrim-tab">
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Status</th>
          <th>Details</th>
        </tr>
      </thead>
      <tbody>
        <tr >
          <td>1 </td>
          <td>name </td>
          <td>status</td>
          <td>details</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</div>
     

  <!---end-->
   
  
    
  </div>
</template>

<script>
import MiniStatisticsCard from "@/examples/Cards/MiniStatisticsCard.vue";
import TimelineList from "./components/TimelineList.vue";
import TimelineItem from "./components/TimelineItem.vue";
import ProjectsCard from "./components/ProjectsCard.vue";

import {
  faHandPointer,
  faUsers,
  faCreditCard,
  faScrewdriverWrench,
} from "@fortawesome/free-solid-svg-icons";

export default {
  name: "dashboard-default",
  el: '#app',
  data() {
    return {
      activeTab: 0,
      tabs: [
        { name: 'DCRIM DASHBOARD', content: 'Content DCRIM DASHBOARD', tableData: [
          { name: 'Task 1', status: 'Completed', details: 'Details of Task 1' },
          { name: 'Task 2', status: 'Pending', details: 'Details of Task 2' },
        ] },
        { name: 'PROCESS DASHBOARD', content: 'Content PROCESS DASHBOARD', tableData: [
          { name: 'Task 3', status: 'Completed', details: 'Details of Task 3' },
          { name: 'Task 4', status: 'Pending', details: 'Details of Task 4' },
        ] },
        { name: 'TECHNICAL DASHBOARD', content: 'Content TECHNICAL DASHBOARD', tableData: [
          { name: 'Task 5', status: 'Completed', details: 'Details of Task 5' },
          { name: 'Task 6', status: 'Pending', details: 'Details of Task 6' },
        ] },
        { name: 'ZCRIM DASHBOARD', content: 'Content ZCRIM DASHBOARD', tableData: [
          { name: 'Task 7', status: 'Completed', details: 'Details of Task 7' },
          { name: 'Task 8', status: 'Pending', details: 'Details of Task 8' },
        ] },
      ],
      
      iconBackground: "bg-gradient-success",
      faCreditCard,
      faScrewdriverWrench,
      faUsers,
      faHandPointer,
    };
  },
  components: {
    MiniStatisticsCard,
    ProjectsCard,
    TimelineList,
    TimelineItem,
  },
};
</script>
<style scoped>
  .nav-tabs {
    border-bottom: 1px solid #dddddd;
  }
  .nav-item {
    margin-bottom: -1px;
  }
  .nav-link {
    cursor: pointer;
  }
  .nav-link.active {
    background-color: #ff7300;
    color: white;
  }
  .table {
    margin-top: 20px;
  }
</style>
