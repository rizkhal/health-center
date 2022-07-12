<script setup>
import { onMounted } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
  vm: Object,
});

const form = useForm({
  vission: null,
  mission: null,
  points: [],
});

onMounted(() => {
  if (!form.points.length) {
    clone();
  }

  form.vission = props.vm?.vission;
  form.mission = props.vm?.mission;

  if (props.vm.details) {
    form.points = props.vm.details.map((v) => {
      return {
        icon: v.icon,
        value: v.text,
      };
    });
  }
});

const clone = () => {
  form.points.push({
    icon: null,
    value: null,
  });
};

const remove = (index) => {
  form.points.splice(index, 1);
};

const save = () => {
  form.post(route("dashboard.kamen-theme.setting.vission-misson"));
};
</script>
<template>
  <v-form-container title="Visi &#38; Misi" @onSubmit="save">
    <div class="flex flex-col space-y-14 mb-12">
      <v-editor
        label="Visi"
        :value="form.vission"
        style="height: 400px"
        :error="form.errors.vission"
        @input="
          (value) => {
            form.vission = value;
          }
        "
      />

      <v-editor
        label="Misi"
        :value="form.mission"
        style="height: 400px"
        :error="form.errors.mission"
        @input="
          (value) => {
            form.mission = value;
          }
        "
      />
    </div>

    <div
      class="flex flex-row items-center space-x-2 mt-3"
      v-for="(point, index) in form.points"
      :key="index"
    >
      <v-text label="Icon" v-model="point.icon" class="w-full" />
      <v-text label="Point" v-model="point.value" class="w-full" />

      <button
        class="btn-red py-3 mt-[22px]"
        @click.prevent="remove(index)"
        :disabled="form.points.length === 1"
      >
        <v-icon name="MinusIcon" class="h-4 w-4" />
      </button>
    </div>
    <div class="flex justify-end">
      <button class="btn-purple py-3 mt-[22px]" @click.prevent="clone">
        <v-icon name="PlusIcon" class="h-4 w-4" />
      </button>
    </div>
  </v-form-container>
</template>
