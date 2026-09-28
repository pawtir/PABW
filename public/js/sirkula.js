document.addEventListener('DOMContentLoaded', () => {
    const roleInputs = document.querySelectorAll('#register-form input[name="role"]');
    const updateRole = () => {
        const active = document.querySelector('#register-form input[name="role"]:checked')?.value;
        document.querySelectorAll('#register-form [data-for-role]').forEach((panel) => {
            const visible = panel.dataset.forRole === active;
            panel.hidden = !visible;
            panel.querySelectorAll('input').forEach((input) => input.disabled = !visible);
        });
    };
    roleInputs.forEach((input) => input.addEventListener('change', updateRole));
    if (roleInputs.length) updateRole();

    document.querySelectorAll('[data-toggle-password]').forEach((btn) => {
        btn.addEventListener('click', () => {
            const field = document.getElementById(btn.dataset.togglePassword);
            if (!field) return;
            field.type = field.type === 'password' ? 'text' : 'password';
            btn.textContent = field.type === 'password' ? 'Lihat' : 'Tutup';
        });
    });
});
