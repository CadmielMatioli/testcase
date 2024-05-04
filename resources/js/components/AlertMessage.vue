<template>
    <div>

    </div>
</template>

<script>

export default {
    props: {
        success: '',
        error: '',
        typeAlert: {}
    },
    data() {
        return {
            message: '',
        }
    },

    methods: {
        toast() {
            return Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
        },

        successWithModal(title, message) {
            if (title) {
                Swal.fire({
                    title: title,
                    html: message,
                    icon: 'success',
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
            }
        },

        successWithModalControll(data) {
            return new Promise((resolve, reject) => {
                Swal.fire({
                    title: data.title,
                    text: data.message,
                    icon: data.icon ?? "warning",
                    showCancelButton: data.showCancelButton ?? true,
                    showConfirmButton: data.showConfirmButton ?? true,
                    confirmButtonColor: data.confirmButtonColor ?? '#3085d6',
                    cancelButtonColor: data.cancelButtonColor ?? "#d33",
                    confirmButtonText: data.confirmButtonText ?? 'OK',
                    allowOutsideClick: data.allowOutsideClick ?? false,
                    cancelButtonText: data.cancelButtonText ?? 'Cancelar',

                }).then((result) => {
                    resolve(result);
                }).catch((error) => {
                    reject(error);
                });
            });
        },

        errorWithModal(title, message) {
            return new Promise((resolve, reject) => {
                if (title) {
                    Swal.fire({
                        title: title,
                        html: message,
                        icon: 'error',
                    }).then((result) => {
                        resolve(result);
                    }).catch((error) => {
                        reject(error);
                    });
                }
            })

        },

        successToast(title) {
            if (title) {
                const swal = this.toast()
                swal.fire({
                    title: title,
                    icon: 'success',
                })
            }

        },

        errorToast(title) {
            if (title) {
                const swal = this.toast()
                swal.fire({
                    title: title,
                    icon: 'error',
                })
            }

        }

    },
    mounted() {
        this.message = this.success ? this.success : this.error

    },
    watch: {
        message(newValue) {
            if (this.success) {
                this.successToast(newValue);
            }
            if (this.error) {
                this.errorToast(newValue);
            }
        },
        typeAlert: {
            handler(newValue) {
                if (newValue.typeModal == 'successWithModalControll') {
                    this.successWithModalControll(newValue)
                }
                if (newValue.typeModal == 'successWithModal') {
                    this.successWithModal(newValue.message)
                }
                if (newValue.typeModal == 'errorWithModal') {
                    this.errorWithModal(newValue.message)
                }
            },
            deep: true
        },
    },
};
</script>
