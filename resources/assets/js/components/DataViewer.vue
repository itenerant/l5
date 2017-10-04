<template>
    <div class="dv">
        <div class="dv-header">
            <div class="dv-header-title">
                {{ title }}
            </div>
            <div class="dv-header-columns">
                <span>Search: </span>
                <select class="dv-header-select">
                    <option v-for="column in columns" :value="column">{{ column }}</option>
                </select>
            </div>
            <div class="dv-header-operators">
                <select class="dv-header-select">
                    <option>=</option>
                </select>
            </div>
            <div class="dv-header-search">
                <input type="text" class="dv-header-input" placeholder="Search...">
            </div>
            <div class="dv-header-submit">
                <button class="dv-header-btn">Filter</button>
            </div>
        </div>
        <div class="dv-body">
            <table class="dv-table">
                <thead>
                    <tr>
                        <th v-for="column in columns">
                            <span>
                                {{ column }}
                            </span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="row in model">
                        <td v-for="(value, key) in row">{{ value }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    import Vue from 'vue'
    import axios from 'axios'

    export default {

        props: ['source', 'title'],

        created() {
            this.fetchIndexData();
        },

        mounted() {
            console.log('Component mounted.')
        },

        data() {
            return {
                model: {},
                columns: {},
                query: {
                    page: 1,
                    column: 'id',
                    direction: 'desc',
                }
            }
        },

        methods: {
            fetchIndexData() {

                let vm = this;

                axios.get(this.source)
                    .then(response => {
                        console.log(response.data);
                        Vue.set(vm.$data, 'model', response.data.data);
                        Vue.set(vm.$data, 'columns', response.data.columns);
                    })
                    .catch(response => {
                        console.log(response.data);
                    });
            }
        }
    }
</script>

<style lang="scss">
    .dv {
        background: #fff;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    }

    .dv-header {
        display: flex;
        justify-content: space-between;
        background: #fff;
        border-bottom: 3px solid #eee;
        padding: 10px 15px;

        &-title {
            flex: 2;
            padding-right: 15px;
        }

        &-select {
            display: block;
            width: 100%;
        }

        &-columns {
            flex: 2;
            display: flex;
            justify-content: space-between;
            padding-right: 15px;
        }

        &-operators {
            flex: 2;
            display: flex;
            justify-content: space-between;
            padding-right: 15px;
        }

        &-search {
            flex: 4;
            padding-right: 15px;
        }

        &-input {
            display: block;
            width: 100%;
        }

        &-submit {
            flex: 1;
        }

        &-btn {
            display: block;
            width: 100%;
        }
    }

    .dv-body {
        flex: 1;
        /*overflow: scroll;*/
    }

    .dv-table {
        width: 100%;
        thead {
            th {
                padding: 5px 10px;
            }
        }
        tbody {
            td {
                padding: 5px 10px;
            }
        }
    }
</style>
