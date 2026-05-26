@push('scripts')
<script>
document.querySelectorAll('.js-price-br').forEach(function (input) {
    input.addEventListener('input', function () {
        var digits = this.value.replace(/\D/g, '');
        if (!digits) {
            this.value = '';
            return;
        }
        var value = parseInt(digits, 10) / 100;
        this.value = value.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    });
});
</script>
@endpush
