<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Academia de Cursos - Aprenda com qualidade</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">Socorro</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#">Cursos</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Sobre</a></li>
                <li class="nav-item"><a class="nav-link btn btn-primary text-white px-3" href="#">Entrar</a></li>
            </ul>
        </div>
    </div>
</nav>

<section class="bg-primary text-white py-5 text-center">
    <div class="container">
        <h1 class="display-4 fw-bold">slaoq</h1>
        <p class="lead">socorosogtekgegegeggg</p>
        <a href="#cursos" class="btn btn-light btn-lg">Ver todos os cursos</a>
    </div>
</section>

<section id="cursos" class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Nossos Cursos</h2>
        
        <div class="row g-4">
            <?php
            $stmt = $pdo->query("SELECT * FROM cursos ORDER BY nome");
            while ($curso = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm curso-card">
                    <img src="images/<?= htmlspecialchars($curso['imagem_url']) ?>" 
                         class="card-img-top" alt="<?= htmlspecialchars($curso['nome']) ?>">
                    
                    <div class="card-body d-flex flex-column">
                        <span class="badge bg-<?= $curso['categoria'] === 'Programação' ? 'success' : 
                                              ($curso['categoria'] === 'Design' ? 'info' : 'warning') ?>">
                            <?= htmlspecialchars($curso['categoria']) ?>
                        </span>
                        
                        <h5 class="card-title mt-3"><?= htmlspecialchars($curso['nome']) ?></h5>
                        <p class="text-muted small">⏰ <?= htmlspecialchars($curso['horario']) ?></p>
                        
                        <div class="mt-auto">
                            <h4 class="text-primary fw-bold">R$ <?= number_format($curso['valor'], 2, ',', '.') ?></h4>
                            <button class="btn btn-primary w-100 mt-3 btn-matricular"
                                    data-id="<?= $curso['id'] ?>"
                                    data-nome="<?= htmlspecialchars($curso['nome']) ?>"
                                    data-preco="<?= $curso['valor'] ?>">
                                Quero me matricular
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>


<div class="modal fade" id="modalMatricula" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitulo">Matricular em <span id="cursoNome"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="formMatricula">
                    <input type="hidden" id="cursoId">
                    <div class="mb-3">
                        <label class="form-label">Nome completo</label>
                        <input type="text" class="form-control" id="nomeAluno" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="emailAluno" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telefone</label>
                        <input type="tel" class="form-control" id="telefoneAluno">
                    </div>
                    <p class="text-end fw-bold">Valor: R$ <span id="modalPreco"></span></p>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success" id="btnConfirmar">Confirmar matrícula</button>
            </div>
        </div>
    </div>
</div>

<footer class="bg-dark text-white py-4 text-center">
    <p>© 2026 AcademiaCursos - Todos os direitos reservados</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="script.js"></script>
</body>
</html>