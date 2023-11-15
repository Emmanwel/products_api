<template>
    <main style="min-height: 50vh; margin-top: 2rem;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <!-- Add new Task -->
                    <NewProduct />

                    <!-- List of uncompleted tasks -->
                    <Products :tasks="uncompletedTasks" />
                    <!-- list of completed tasks -->
                   <!-- <Products :tasks="completedTasks" :show="completedTasksIsVisible && showCompletedTasks" /> -->
                </div>
            </div>
        </div>
    </main>
</template>
<script setup>
import { computed, onMounted, ref } from "vue";
import { storeToRefs } from "pinia";
import { useTaskStore } from "../stores/product";
import Products from "../components/tasks/Products.vue";
import NewProduct from "../components/tasks/NewProduct.vue";

const store = useTaskStore()
const { completedTasks, uncompletedTasks } = storeToRefs(store)
const { fetchAllTasks } = store

onMounted(async () => {
    await fetchAllTasks()
})

const showToggleCompletedBtn = computed(
    () => uncompletedTasks.value.length > 0 && completedTasks.value.length > 0
)
const completedTasksIsVisible = computed(
    () => uncompletedTasks.value.length === 0 || completedTasks.value.length > 0
)
const showCompletedTasks = ref(false || completedTasksIsVisible.value)
</script>