<template>
  <div class="card">
    <div class="card-header pb-0">
      <div class="row">
        <div class="col-lg-6 col-7">
          <h6>Tickets</h6>
          <p class="text-sm mb-0">
            <i class="fa fa-check text-info" aria-hidden="true"></i>
            <span class="font-weight-bold ms-1">30 done</span> this month
          </p>
        </div>
        <div class="col-lg-6 col-5 my-auto text-end">
          <div class="dropdown float-lg-end pe-4">
            <a
              class="cursor-pointer"
              id="dropdownTable"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              <i class="fa fa-ellipsis-v text-secondary" aria-hidden="true"></i>
            </a>
            <ul
              class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5"
              aria-labelledby="dropdownTable"
            >
              <li>
                <a class="dropdown-item border-radius-md" href="javascript:;"
                  >Action</a
                >
              </li>
              <li>
                <a class="dropdown-item border-radius-md" href="javascript:;"
                  >Another action</a
                >
              </li>
              <li>
                <a class="dropdown-item border-radius-md" href="javascript:;"
                  >Something else here</a
                >
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body px-0 pb-2">
      <div class="table-responsive">
        <table class="table align-items-center mb-0">
          <thead>
            <tr>
              <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7">Agents</th>
              <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7">Totals</th>
              <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 ps-2"> Resolved</th>
              <th class="text-center text-uppercase text-secondary text-s font-weight-bolder opacity-7">Pending</th>
              <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Completion</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <div class="d-flex px-2 py-1">
                  <div class="d-flex flex-column justify-content-center">
                    <h6 class="mb-0 text-sm">DCRIM</h6>
                  </div>
                </div>
              </td>
              <td class="align-middle text-center text-sm">
                <span class="text-xs font-weight-bold">14,000</span>
              </td>
              <td class="align-middle text-center text-sm">
                <span class="text-xs font-weight-bold">14,000</span>
              </td>
              <td class="align-middle text-center text-sm">
                <span class="text-xs font-weight-bold">14,000</span>
              </td>
              <td class="align-middle">
                <div class="d-flex align-items-center justify-content-center">
                  <span class="text-xs font-weight-bold mx-2">60%</span>
                  <div>
                    <soft-progress
                      color="info"
                      class="mx-auto"
                      variant="gradient"
                      :percentage="60"
                    />
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex px-2 py-1">
                  <div class="d-flex flex-column justify-content-center">
                    <h6 class="mb-0 text-sm">PROCESS</h6>
                  </div>
                </div>
              </td>
              <td class="align-middle text-center text-sm">
                <span class="text-s font-weight-bold">14,000</span>
              </td>
              <td class="align-middle text-center text-sm">
                <span class="text-xs font-weight-bold">14,000</span>
              </td>
              <td class="align-middle text-center text-sm">
                <span class="text-xs font-weight-bold">14,000</span>
              </td>
              <td class="align-middle">
                <div class="d-flex align-items-center justify-content-center">
                  <span class="text-xs font-weight-bold mx-2">60%</span>
                  <div>
                    <soft-progress
                      color="info"
                      class="mx-auto"
                      variant="gradient"
                      :percentage="60"
                    />
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex px-2 py-1">
                  <div class="d-flex flex-column justify-content-center">
                    <h6 class="mb-0 text-sm">TECHNICAL</h6>
                  </div>
                </div>
              </td>
              <td class="align-middle text-center text-sm">
                <span class="text-xs font-weight-bold">14,000</span>
              </td>
              <td class="align-middle text-center text-sm">
                <span class="text-xs font-weight-bold">14,000</span>
              </td>
              <td class="align-middle text-center text-sm">
                <span class="text-xs font-weight-bold">14,000</span>
              </td>
              <td class="align-middle">
                <div class="d-flex align-items-center justify-content-center">
                  <span class="text-xs font-weight-bold mx-2">60%</span>
                  <div>
                    <soft-progress
                      color="info"
                      class="mx-auto"
                      variant="gradient"
                      :percentage="60"
                    />
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex px-2 py-1">
                  <div class="d-flex flex-column justify-content-center">
                    <h6 class="mb-0 text-sm">ZCRIM</h6>
                  </div>
                </div>
              </td>
              <td class="align-middle text-center text-sm">
                <span class="text-xs font-weight-bold">14,000</span>
              </td>
              <td class="align-middle text-center text-sm">
                <span class="text-xs font-weight-bold">14,000</span>
              </td>
              <td class="align-middle text-center text-sm">
                <span class="text-xs font-weight-bold">14,000</span>
              </td>
              <td class="align-middle">
                <div class="d-flex align-items-center justify-content-center">
                  <span class="text-xs font-weight-bold mx-2">60%</span>
                  <div>
                    <soft-progress
                      color="info"
                      class="mx-auto"
                      variant="gradient"
                      :percentage="60"
                    />
                  </div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import setTooltip from "@/assets/js/tooltip.js";
import SoftAvatar from "@/components/SoftAvatar.vue";
import SoftProgress from "@/components/SoftProgress.vue";
import img1 from "../../assets/img/small-logos/logo-xd.svg";
import img2 from "../../assets/img/team-1.jpg";
import img3 from "@/assets/img/team-2.jpg";
import img4 from "../../assets/img/team-3.jpg";
import img5 from "../../assets/img/team-4.jpg";
import img6 from "../../assets/img/small-logos/logo-atlassian.svg";
import img7 from "../../assets/img/team-2.jpg";
import img8 from "../../assets/img/team-4.jpg";
import img9 from "../../assets/img/small-logos/logo-slack.svg";
import img10 from "../../assets/img/team-3.jpg";
import img11 from "../../assets/img/team-1.jpg";
import img12 from "../../assets/img/small-logos/logo-spotify.svg";
import img13 from "../../assets/img/team-4.jpg";
import img14 from "../../assets/img/team-3.jpg";
import img15 from "../../assets/img/team-4.jpg";
import img16 from "../../assets/img/team-1.jpg";
import img17 from "../../assets/img/small-logos/logo-jira.svg";
import img18 from "../../assets/img/team-4.jpg";
import img19 from "../../assets/img/small-logos/logo-invision.svg";
import img20 from "../../assets/img/team-1.jpg";
import img21 from "../../assets/img/team-4.jpg";

export default {
  name: "projects-card",
  data() {
    return {
      img1,
      img2,
      img3,
      img4,
      img5,
      img6,
      img7,
      img8,
      img9,
      img10,
      img11,
      img12,
      img13,
      img14,
      img15,
      img16,
      img17,
      img18,
      img19,
      img20,
      img21,
    };
  },
  components: {
    SoftAvatar,
    SoftProgress,
  },
  mounted() {
    setTooltip();
  },
};
</script>
