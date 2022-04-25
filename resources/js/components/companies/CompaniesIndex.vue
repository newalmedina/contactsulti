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
            <router-link :to="{ name: 'companies.index' }" class="text-muted">{{
              subtitle
            }}</router-link>
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
              <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                  <span class="card-label font-weight-bolder text-dark">{{
                    subtitle
                  }}</span>
                </h3>
                <div class="card-toolbar">
                  <router-link
                    :to="{ name: 'companies.create' }"
                    class="btn btn-success"
                    >Create company</router-link
                  >
                </div>
              </div>
              <!--end::Header-->
              <!--begin::Body-->
              <div class="card-body pt-0 pb-3">
                <table class="table table-striped mt-3">
                  <thead>
                    <tr>
                      <th scope="col">Name</th>
                      <th scope="col">email</th>
                      <th scope="col">address</th>
                      <th scope="col">website</th>
                      <th scope="col" style="width: 200px">action</th>
                    </tr>
                  </thead>
                  <tbody v-for="item in companies" :key="item.id">
                    <tr>
                      <th scope="row">{{ item.name }}</th>
                      <td>{{ item.email }}</td>
                      <td>{{ item.address }}</td>
                      <td>{{ item.website }}</td>
                      <td>
                        <router-link
                          :to="{
                            name: 'companies.edit',
                            params: { id: item.id },
                          }"
                          class="mr-1 btn btn-primary btn-xs"
                          >Edit</router-link
                        >
                        <button
                          @click="deleteCompany(item.id)"
                          class="btn btn-danger btn-xs"
                        >
                          Delete
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!--end::Body-->
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
  name: "CompaniesIndex",
  data() {
    return {
      title: "Company",
      subtitle: "Listado company",
      companies: [],
    };
  },
  mounted() {
    this.getCompanies();
  },
  methods: {
    async getCompanies() {
      await axios
        .get("/api/companies")
        .then((response) => {
          this.companies = response.data.data;
        })
        .catch((error) => {
          console.log(error);
          this.companies = [];
        });
    },
    async deleteCompany(id) {
      if (!window.confirm("Seguro que quieres eliminar registro?")) {
        return;
      }
      await axios
        .delete("/api/companies/" + id)
        .then((response) => {
          this.getCompanies();
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>