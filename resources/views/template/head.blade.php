<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{asset('images/logo/logo-nexus.png')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/medias.css') }}">
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Seleciona todos os links que abrem modal
            const openModalLinks = document.querySelectorAll('.open-modal');
            const modals = document.querySelectorAll('.custom-modal');
        
            openModalLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const modalId = link.getAttribute('data-modal');
                    const modal = document.getElementById(modalId);
                    if(modal) {
                        modal.style.display = 'flex';
                    }
                });
            });
        
            // Fecha modal quando clica no "x" ou fora da área do conteúdo
            modals.forEach(modal => {
                modal.addEventListener('click', (e) => {
                    if(e.target.classList.contains('custom-modal') || e.target.classList.contains('close')){
                        modal.style.display = 'none';
                    }
                });
            });
        });
        </script>
        
    <title>Revista Digital</title>
</head>