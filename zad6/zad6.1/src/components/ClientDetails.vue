<template>
  <div>
    <h1>Client Details</h1>
    <p>Name: {{ client.name }}</p>
    <p>Employee: {{ client.employee }}</p>
    <p>Last Purchases: {{ client.lastPurchases }}</p>
    <p>Total Spendings: {{ client.totalSpendings }}</p>
    <p>Car: {{ client.car }}</p>
  </div>
</template>

<script>
export default {
  props: ['id'],
  data() {
    return {
      client: {},
    };
  },
  created() {
    // W tym miejscu pobierz informacje o kliencie na podstawie przekazanego ID
    // np. za pomocą zapytania do API lub pobierając dane z lokalnego magazynu danych
    this.client = { id: this.id, name: 'John', employee: 'Alice', lastPurchases: [], totalSpendings: 0, car: 'Car A' };
  },
};
</script>