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

  if (props.vm?.details) {
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
    <div class="my-12 flex flex-row space-x-4">
      <v-editor
        label="Visi"
        :value="form.vission"
        style="height: 400px; width: 100%"
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
        style="height: 400px; width: 100%"
        :error="form.errors.mission"
        @input="
          (value) => {
            form.mission = value;
          }
        "
      />
    </div>

    <div
      class="mt-3 flex flex-row items-center space-x-2"
      v-for="(point, index) in form.points"
      :key="index"
    >
      <v-text label="Icon" v-model="point.icon" class="w-full" />
      <v-text label="Point" v-model="point.value" class="w-full" />

      <button
        class="btn-red mt-[22px] py-3"
        @click.prevent="remove(index)"
        :disabled="form.points.length === 1"
      >
        <v-icon name="MinusIcon" class="h-4 w-4" />
      </button>
    </div>
    <div class="flex justify-end">
      <button class="btn-purple mt-[22px] py-3" @click.prevent="clone">
        <v-icon name="PlusIcon" class="h-4 w-4" />
      </button>
    </div>
  </v-form-container>
</template>
