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
                    class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-5 font-size-sm ul_breadcrumb"
                >
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
                <!--begin::alert message-->

                <errorsComponent :message="errors" />

                <!--end::alert message-->
                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-12">
                        <!--begin::Advance Table Widget 4-->
                        <div class="card card-custom card-stretch gutter-b">
                            <!--begin::Header-->
                            <div class="card-header py-5">
                                <h3
                                    class="card-title align-items-start flex-column"
                                >
                                    <span
                                        class="card-label font-weight-bolder text-dark"
                                        >{{ subtitle }}</span
                                    >
                                </h3>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-3 pb-3">
                                <form
                                    id="formData"
                                    @submit.prevent="saveData(profile.id)"
                                    enctype="multipart/form-data"
                                >
                                    <div class="form-group mt-1 row">
                                        <div class="col-12">
                                            <label>Nombre</label>
                                            <input
                                                name="first_name"
                                                type="text"
                                                class="form-control"
                                                v-model="profile.first_name"
                                            />
                                        </div>
                                    </div>
                                    <div class="form-group mt-1 row">
                                        <div class="col-12">
                                            <label>Apellidos</label>
                                            <input
                                                name="last_name"
                                                type="text"
                                                class="form-control"
                                                v-model="profile.last_name"
                                            />
                                        </div>
                                    </div>
                                    <div class="form-group mt-1 row">
                                        <div class="col-12">
                                            <label>Sexo</label>
                                            <div class="radio-inline">
                                                <label class="radio">
                                                    <input
                                                        name="gender"
                                                        value="male"
                                                        type="radio"
                                                        v-model="profile.gender"
                                                        :checked="
                                                            profile.gender ==
                                                            'male'
                                                        "
                                                    />
                                                    <span></span>Masculino
                                                </label>
                                                <label class="radio">
                                                    <input
                                                        name="gender"
                                                        value="male"
                                                        type="radio"
                                                        v-model="profile.gender"
                                                        :checked="
                                                            profile.gender ==
                                                            'male'
                                                        "
                                                    />
                                                    <span></span>Femenino
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-1 row">
                                        <div class="col-12">
                                            <label>Teléfono</label>
                                            <input
                                                name="phone"
                                                type="text"
                                                class="form-control"
                                                v-model="profile.phone"
                                            />
                                        </div>
                                    </div>
                                    <div class="form-group mt-1 row">
                                        <div class="col-12">
                                            <label>Foto</label>
                                            <div class="custom-file">
                                                <input
                                                    type="file"
                                                    class="custom-file-input"
                                                    id="photo"
                                                    name="photo"
                                                    v-on:change="onChange"
                                                />
                                                <label
                                                    class="custom-file-label"
                                                    for="customFile"
                                                    >Seleccione Archivo</label
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-1 row">
                                        <div class="col-12">
                                            <label>Email</label>
                                            <div class="input-group">
                                                <div
                                                    class="input-group-prepend"
                                                >
                                                    <span
                                                        class="input-group-text"
                                                        ><i
                                                            class="fas fa-envelope"
                                                        ></i
                                                    ></span>
                                                </div>
                                                <input
                                                    name="text"
                                                    type="text"
                                                    class="form-control"
                                                    v-model="profile.email"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-1 row">
                                        <div class="col-12 col-md-6">
                                            <label>Contraseña</label>
                                            <div class="input-group">
                                                <div
                                                    class="input-group-prepend"
                                                >
                                                    <span
                                                        class="input-group-text"
                                                    >
                                                        <i
                                                            class="fas fa-key"
                                                        ></i
                                                    ></span>
                                                </div>
                                                <input
                                                    name="password"
                                                    type="password"
                                                    class="form-control"
                                                    v-model="profile.password"
                                                />
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label>Repetir contraseña</label>
                                            <div class="input-group">
                                                <div
                                                    class="input-group-prepend"
                                                >
                                                    <span
                                                        class="input-group-text"
                                                    >
                                                        <i
                                                            class="fas fa-key"
                                                        ></i
                                                    ></span>
                                                </div>
                                                <input
                                                    name="password_confirmation"
                                                    type="password"
                                                    class="form-control"
                                                    v-model="
                                                        profile.password_confirmation
                                                    "
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--end::Body-->
                            <div class="card-footer">
                                <div
                                    class="mt-3 d-flex justify-content-between"
                                >
                                    <router-link
                                        :to="{ name: 'categories.index' }"
                                        class="btn btn-secondary"
                                        >Regresar</router-link
                                    >
                                    <button
                                        form="formData"
                                        class="btn btn-success"
                                        type="submit"
                                    >
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
import successComponent from "../partials/SuccessComponent.vue";
import errorsComponent from "../partials/ErrorsComponent.vue";

export default {
    name: "ProfileEdit",
    components: {
        successComponent,
        errorsComponent,
    },
    data() {
        return {
            title: "Perfil usuario",
            subtitle: "",
            profile: {},
            errors: [],
            successMessage: "",
            file: '',
        };
    },
    props: {
        id: {
            // required: true,
            type: String,
        },
    },
    mounted() {
        this.getProfile(this.id);
        this.subtitle = "Perfil usuario";
    },

    methods: {
         onChange(e) {
                this.file =
                this.getBase64( e.target.files[0]).then(
                data => console.log(data)
                );
            },

         getBase64(file) {
            return new Promise((resolve, reject) => {
                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = () => resolve(reader.result);
                reader.onerror = error => reject(error);
            });
        },

        async saveData(id) {
            this.successMessage = "";
            this.errors = [];
             var config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                };

            this.profile.file=this.file;

            await axios
                .patch("/api/profiles/" + id, this.profile)
                .then((response) => {
                    this.profile = response.data;
                    // this.$swal('Registro Guardado Correctamente');
                    // this.successMessage = moment().format("DD/MM/YY HH:mm").". Registro guardado correctamente";

                    Swal.fire({
                       title: "Guardado",
                        text:
                            moment().format("DD/MM/YY HH:mm") +
                            ". Registro guardado correctamente",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 1500
                        });
                })
                .catch((e) => {
                    if (e.response.status === 422) {
                        // this.errors = e.response.data.errors;
                        for (const key in e.response.data.errors) {
                            this.errors.push(e.response.data.errors[key][0]);
                            //      this. errors +="<br/>"+ e.response.data.errors[key][0];
                        }
                        console.log(this.errors);
                    }
                });
        },

        async getProfile(id) {
            await axios
                .get("/api/profiles/" + id)
                .then((response) => {
                    this.profile = response.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
};
</script>
