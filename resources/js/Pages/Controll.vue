<template>
        <div class="py-12 flex">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg"
                >
                    <!--Content -->
                    <div>
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                            @click="sweetActionTwo"
                        >
                            Portão Atendimento
                        </button>

                        <button
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
                            @click="sweetActionOne"
                        >
                            Portão Ponto de Onibus
                        </button>
                    </div>
                    <!--EndContent-->
                </div>
            </div>
        </div>
</template>

<script>
import Swal from "sweetalert2";
import axios from "axios";

export default {
    methods: {
        sendCallback(info) {
            axios
                .post("/callback", { data: info })
                .then((response) => {
                    console.log(response.data);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        sweetActionOne() {
            Swal.fire({
                title: "Cuidado! Você viu a camera?",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Sim",
                cancelButtonText: "Não",
            }).then((result) => {
                if (result.isConfirmed) {
                    // User clicked "Yes"
                    this.sendCallback("A");
                    Swal.fire("Enviando Sinal", "Portão Esquerdo", "success");
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    // User clicked "No" or closed the modal
                    Swal.fire(
                        "Segurança é tudo",
                        "Parabens! Evite Acidentes!",
                        "error"
                    );
                }
            });
        },
        sweetActionTwo() {
            Swal.fire({
                title: "Cuidado! Você viu a camera?",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Sim",
                cancelButtonText: "Não",
            }).then((result) => {
                if (result.isConfirmed) {
                    // User clicked "Yes"
                    this.sendCallback("B");
                    Swal.fire("Enviando Sinal", "Portão Direito", "success");
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    // User clicked "No" or closed the modal
                    Swal.fire(
                        "Segurança é tudo",
                        "Parabens! Evite Acidentes!",
                        "error"
                    );
                }
            });
        },
    },
};
</script>
