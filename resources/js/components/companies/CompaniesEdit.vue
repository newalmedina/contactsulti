<template>
  <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
      <div class="container-fluid d-flex justify-content-between">
        <!--begin::Page Title-->
        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
          {{ title }}
        </h5>
        <!--end::Page Title-->
        <!--begin::Breadcrumb-->
        <ul
          class="
            breadcrumb breadcrumb-transparent breadcrumb-dot
            font-weight-bold
            p-0
            my-5
            font-size-sm
            ul_breadcrumb
          "
        >
          <li class="breadcrumb-item li_bread">
            <router-link :to="{ name: 'companies.index' }" class="text-muted"
              >listado company</router-link
            >
          </li>
          <li class="breadcrumb-item li_bread">
            {{ subtitle }}
          </li>
        </ul>
        <!--begin::Breadcrumb-->
      </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
      <!--begin::Container-->
      <div class="container">
        <!--begin::Dashboard-->
        <!--begin::Row-->
        <div class="row"></div>
        <!--end::Row-->
        <!--begin::Row-->
        <div class="row">
          <div class="col-lg-12">
            <!--begin::Advance Table Widget 4-->
            <div class="card card-custom card-stretch gutter-b">
              <!--begin::Header-->
              <div class="card-header py-5">
                <h3 class="card-title align-items-start flex-column">
                  <span class="card-label font-weight-bolder text-dark">{{
                    subtitle
                  }}</span>
                </h3>
              </div>
              <!--end::Header-->
              <!--begin::Body-->
              <div class="card-body pt-3 pb-3">
                <div class="alert alert-danger" v-if="errors !== ''">
                  {{ errors }}
                </div>
                <form id="formData" @submit.prevent="saveData(company.id)">
                  <div class="form-group mt-1">
                    <label>Name</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="company.name"
                    />
                  </div>
                  <div class="form-group mt-1">
                    <label>email</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="company.email"
                    />
                  </div>
                  <div class="form-group mt-1">
                    <label>address</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="company.address"
                    />
                  </div>
                  <div class="form-group mt-1">
                    <label>website</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="company.website"
                    />
                  </div>
                </form>
              </div>
              <!--end::Body-->
              <div class="card-footer">
                <div class="mt-3 d-flex justify-content-between">
                  <router-link
                    :to="{ name: 'companies.index' }"
                    class="btn btn-secondary"
                    >Regresar</router-link
                  >
                  <button form="formData" class="btn btn-success" type="submit">
                    Guardar
                  </button>
                </div>
              </div>
            </div>
            <!--end::Advance Table Widget 4-->
          </div>
        </div>
        <!--end::Row-->
        <!--end::Dashboard-->
      </div>
      <!--end::Container-->
    </div>
    <!--end::Entry-->
  </div>
</template>




<script>
export default {
  name: "CompaniesEdit",
  data() {
    return {
      title: "company",
      subtitle: "",
      company: {},
      errors: "",
    };
  },
  props: {
    id: {
      // required: true,
      type: String,
    },
  },
  mounted() {
    this.subtitle = "Create company";
    if (this.id != null) {
      this.getCompany(this.id);
      this.subtitle = "Edit Company";
    }
  },

  methods: {
    async saveData(id) {
      if (this.id != null) {
        await axios
          .put("/api/companies/" + id, this.company)
          .then((response) => {
            this.$router.push({ name: "companies.index" });
          })
          .catch((error) => {
            if (error.response.status === 422) {
              this.errors = error.response.data.errors;
            }
          });
      } else {
        await axios
          .post("/api/companies", this.company)
          .then((response) => {
            this.$router.push({ name: "companies.index" });
          })
          .catch((error) => {
            if (error.response.status === 422) {
              this.errors = error.response.data.errors;
            }
          });
      }
    },

    async getCompany(id) {
      await axios
        .get("/api/companies/" + id)
        .then((response) => {
          this.company = response.data.data;
          console.log(this.company);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>