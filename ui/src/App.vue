<template>
    <div id="app vh-100">

        <div class="card m-4 vh-100">
            <div class="card-header d-flex align-items-center">
                <div class="flex-grow-1">
                    Browse countries
                </div>
                <div class="ml-auto">
                    <b-form-input
                        v-model.trim="searchedCountryCode"
                        debounce="300"
                        placeholder="Search by country code"
                        @update="filterCountries"
                    />
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th
                                v-for="headerName in ['id', 'name', 'country code', 'calling code']"
                                :key="headerName"
                            >
                                {{ headerName }}
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="(country, index) in countries"
                            :key="country.id"
                        >
                            <td>
                                {{ country.id }}
                            </td>
                            <td>
                                <template v-if="!visibleCountryFormsMap[country.id]">
                                    {{ country.name }}
                                </template>
                                <input
                                    v-else
                                    v-model="countries[index].name"
                                    type="text"
                                    class="form-control"
                                />
                            </td>
                            <td>
                                <template v-if="!visibleCountryFormsMap[country.id]">
                                    {{ country.countryCode }}
                                </template>
                                <input
                                    v-else
                                    v-model="countries[index].countryCode"
                                    type="text"
                                    class="form-control"
                                />
                            </td>
                            <td>
                                <template v-if="!visibleCountryFormsMap[country.id]">
                                    {{ country.callingCode }}
                                </template>
                                <input
                                    v-else
                                    v-model.number="countries[index].callingCode"
                                    type="text"
                                    class="form-control"
                                />
                            </td>
                            <td>
                                <button
                                    v-show="!visibleCountryFormsMap[country.id]"
                                    type="button"
                                    class="btn btn-light"
                                    @click="changeCountryFormVisibility(country.id, true)"
                                >
                                    Edit
                                </button>
                                <button
                                    v-show="visibleCountryFormsMap[country.id]"
                                    type="button"
                                    class="btn btn-success"
                                    @click="saveChanges(country.id)"
                                >
                                    Save
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</template>

<script>

import axios from 'axios';
import { BFormInput } from 'bootstrap-vue';

export default {
    name: 'App',
    components: {
        BFormInput
    },
    data () {
        return {
            countries: [],
            visibleCountryFormsMap: {},
            searchedCountryCode: null
        };
    },
    mounted () {
        this.getCountries();
    },
    methods: {
        async getCountries (offset = 0, itemsPerPage = 500, countryCode = null) {
            try {
                let { data } = await axios.get('/api/country/list', {
                    params: {
                        offset, itemsPerPage, ...(countryCode ? { countryCode } : {})
                    }
                });

                this.countries = data;
            } catch (e) {
                alert('Error');
            }
        },
        changeCountryFormVisibility (countryId, visible) {
            this.$set(this.visibleCountryFormsMap, countryId, visible);
        },
        async saveChanges (countryId) {
            let countryToSave = this.countries.find(country => country.id === countryId);

            try {
                await axios.post('/api/country/change-details', countryToSave, {
                    headers: {
                        'X-Deliberate-Application': 'yes'
                    }
                });
                this.changeCountryFormVisibility(countryId, false);
                countryToSave.countryCode = countryToSave.countryCode.toUpperCase();
            } catch (e) {
                alert('Error');
            }
        },
        async filterCountries () {
            await this.getCountries(0, 500, this.searchedCountryCode);
        }
    }
};
</script>

<style>
#app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
    margin-top: 60px;
}
</style>
