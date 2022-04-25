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
            <router-link
              :to="{ name: 'categories.index' }"
              class="text-muted"
              >{{ subtitle }}</router-link
            >
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
                    :to="{ name: 'categories.create' }"
                    class="btn btn-success"
                    >Crear categoría</router-link
                  >
                </div>
              </div>
              <!--end::Header-->
              <!--begin::Body-->
              <div class="card-body pt-0 pb-3">
                <table class="table table-striped mt-3">
                  <thead>
                    <tr>
                      <th scope="col">Nombre</th>
                      <th scope="col">Activo</th>
                      <th scope="col" style="width: 150px">Acción</th>
                    </tr>
                  </thead>
                  <tbody v-for="item in categories" :key="item.id">
                    <tr>
                      <th scope="row">{{ item.name }}</th>
                      <td>
                        {{ item.active }}
                        <button class="btn btn-warning">
                          <i class="fas fa-eye"></i>
                        </button>
                      </td>
                      <td>
                        <router-link
                          :to="{
                            name: 'categories.edit',
                            params: { id: item.id },
                          }"
                          class="mr-1 btn btn-primary btn-sm text-center"
                          ><i class="fas fa-edit"></i
                        ></router-link>
                        <button
                          @click="deleteCompany(item.id)"
                          class="btn btn-danger btn-sm text-center"
                        >
                          <i class="fas fa-trash"></i>
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
  name: "CategoriesIndex",
  data() {
    return {
      title: "Categoía",
      subtitle: "Listado categoría",
      categories: [],
    };
  },
  mounted() {
    this.getCategories();
  },
  methods: {
    async getCategories() {
      await axios
        .get("/api/categories")
        .then((response) => {
          this.categories = response.data.data;
        })
        .catch((error) => {
          console.log(error);
          this.categories = [];
        });
    },
    async deleteCompany(id) {
      if (!window.confirm("Seguro que quieres eliminar registro?")) {
        return;
      }
      await axios
        .delete("/api/categories/" + id)
        .then((response) => {
          this.getCategories();
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>