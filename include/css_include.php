
<!-- Favicons -->
<link href="img/logo.png" rel="icon">
<!-- bootstrap -->
<link href="./css/bootstrap.min.css" rel="stylesheet">
<!-- sweet-alert -->
<!-- <link href="./css/sweet-alert.css" rel="stylesheet"> -->
<link href="./css/sweetalert2.min.css" rel="stylesheet">

<!-- estilos custom -->
<link href="./css/main.css" rel="stylesheet">
<!-- <link href="./css/bootstrap-material-design.min.css" rel="stylesheet"> -->
<link href="./css/material-design-iconic-font.min.css" rel="stylesheet">
<link href="./css/bootstrap-icons.css" rel="stylesheet">

<link rel="stylesheet" href="css/dataTables.bootstrap5.min.css">

<!-- Template Main CSS File -->
<link href="assets/css/style.css" rel="stylesheet">
<link rel="stylesheet" href="./css/select2.min.css">
<style>
    .card-title {
        margin-bottom: 1.5rem;
        border-bottom: 2px solid #012970;
        padding-bottom: 0.5rem;
    }
    .invalid {
        border: var(--bs-red) 2px solid;
    }
    .valid {
        border: var(--bs-green) 2px solid;
    }
    .glassmorph {
        background-color: rgba(0, 0, 0, 0.50);
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5);
        -moz-backdrop-filter: blur(10px);
    }

    .container {
        margin-top: 4em;
        margin-bottom: 4em;
    }

    @keyframes loading-skeleton {
        from {
            opacity: .4;
        }
        to {
            opacity: 1;
        }
    }
    .loading-skeleton {
        pointer-events: none;
        animation: loading-skeleton 1s infinite alternate;
        
        img {
            filter: grayscale(100) contrast(0%) brightness(1.8);
        }
        h1, h2, h3, h4, h5, h6,
        p, li,
        .btn,
        label,
        .form-control {
            color: transparent;
            appearance: none;
            -webkit-appearance: none;
            background-color: #eee;
            border-color: #eee;

            &::placeholder {
                color: transparent;
            }
        }
    }
</style>
