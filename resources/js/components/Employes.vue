<template>
    <div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Birthdate</th>
                    <th scope="col">Department</th>
                    <th scope="col">Position</th>
                    <th scope="col">Payment type</th>
                    <th scope="col">Payment for month</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="employee in employes.data">
                    <th scope="row">{{ employee.id }}</th>
                    <th scope="row">{{ employee.surname + " " +  employee.name + " " +  employee.patronymic}}</th>
                    <th scope="row">{{ employee.birthdate }}</th>
                    <th scope="row">{{ employee.department.name }}</th>
                    <th scope="row">{{ employee.position }}</th>
                    <th scope="row">{{ getPeymentType(employee.payment_type) }}</th>
                    <th scope="row">{{ getPeymentForMonth(employee.payment_type, employee.payment_value, employee.hour_per_month) }}</th>
                </tr>
                </tbody>
            </table>
        </div>
        <pagination style="width: 100%; overflow-x: auto;" :data="employes" @pagination-change-page="getEmployes"></pagination>
    </div>
</template>

<script>
import {mapGetters} from "vuex";

export default {
    name: "Employes",
    data() {
        return {
            currentPage: 0,
            currentPerPage: 10
        }
    },
    computed: {
        ...mapGetters(['employes'])
    },
    methods: {
        getPeymentType: function (pt) {
            if (pt === 1)
                return "Monthly"
            if (pt === 2)
                return "Hourly"
        },
        getPeymentForMonth: function (pt, pv, hpm) {
            if (pt === 1)
                return pv;
            if (pt === 2) {
                return pv * hpm;
            }
        },
        getEmployes: function (page) {
            let perPage = this.currentPerPage;
            this.$store.dispatch('employes', page, perPage)
                .then(() => {})
                .catch(err => {});
        }
    },
    created() {
        this.getEmployes();
    }
}
</script>

<style scoped>

</style>
