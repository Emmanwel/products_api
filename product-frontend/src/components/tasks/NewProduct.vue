<template>
    <div>
        <button @click="openModal" class="btn btn-primary mt-2">Add Product</button>

        <!-- Bootstrap Modal -->
        <div class="modal" id="taskModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="addNewTask">
                            <div class="mb-3">
                                <label for="taskName" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="taskName" v-model.trim="newTask.name">
                            </div>
                            <button type="submit" class="btn btn-primary">Save Task</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { reactive } from 'vue';
import { useTaskStore } from "../../stores/product";

const store = useTaskStore()
const { handleAddedTask } = store

const newTask = reactive({
    name: '',
    is_completed: false
})

const openModal = () => {
    // Open Bootstrap modal
    new bootstrap.Modal(document.getElementById('taskModal')).show();
}

const addNewTask = async () => {
    if (newTask.name.trim()) {
        await handleAddedTask(newTask)
        newTask.name = ''
        // Close Bootstrap modal
        new bootstrap.Modal(document.getElementById('taskModal')).hide();
    }
}
</script>




