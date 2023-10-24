

<script setup>
import { defineProps, computed } from 'vue';
import { inject } from 'vue'

const DarkMode = inject('DarkMode')

const props = defineProps({
  client: Object,
  transactions: Array,
  auth: Object
})

const transactionsTotal = computed(() => {
  return props.transactions.reduce((total, transaction) => total + (transaction.total_amount || 0), 0);
});
</script>

<style scoped>
.container {
  padding: 0 1rem;
}

.section-title {
  font-size: 1.875rem;
  font-weight: 600;
  margin-bottom: 1rem;
}

.client-details, .transactions {
  padding: 2rem;
  border-radius: 0.5rem;
  box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
  margin-bottom: 1.5rem;
}

.detail-list p, .total-transactions {
  font-size: 1rem;
  margin-bottom: 0.5rem;
}

.transactions-table {
  width: 100%;
  margin-top: 1rem;
  border-collapse: collapse;
}
.transactions-table th, .transactions-table td {
  padding: 0.75rem;
  text-align: left;
  border-bottom: 1px solid #e2e8f0;
}
.transactions-table th {
  font-weight: 500;
}
</style>

<template>
    <div>
      <Head title="Client Details" />
      <div class="container p-4 mx-auto mt-3" :class="[DarkMode ? 'bg-gray-600 shadow-2xl rounded-lg overflow-hidden text-white' : 'bg-white-200 shadow-2xl rounded-lg overflow-hidden']">
        <section class="p-4 client-details-and-transactions">
          <h2 class="mb-4 text-2xl font-semibold section-title">Client Details</h2>
          <div class="grid grid-cols-2 gap-4">
            <div class="text-lg">
              <p><strong>Full Name:</strong> {{ client.first_name }} {{ client.last_name }}</p>
              <p><strong>Address:</strong> {{ client.address }}</p>
            </div>
            <div class="text-lg">
              <p><strong>Phone:</strong> {{ client.phone }}</p>
              <p><strong>Credit Limit:</strong> {{ client.credit_limit }}</p>
            </div>
          </div>
        </section>

        <section class="p-4 transactions">
          <h2 class="mb-4 text-2xl font-semibold section-title">Transactions</h2>
          <table class="w-full transactions-table">
            <thead>
              <tr>
                <th class="text-left">Date</th>
                <th class="text-left">Payment Type</th>
                <th class="text-left">Total Amount</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="transaction in transactions" :key="transaction.id">
                <td class="text-lg">{{ transaction.date }}</td>
                <td class="text-lg">{{ transaction.is_credit ? 'Credit' : 'Cash' }}</td>
                <td class="text-lg">{{ transaction.total_amount }}</td>
              </tr>
            </tbody>
          </table>
          <p class="mt-4 text-lg total-transactions"><strong>Total Transactions:</strong> {{ transactionsTotal }}</p>
        </section>
      </div>
    </div>
  </template>


