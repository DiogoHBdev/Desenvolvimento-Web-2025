-- ---------------------------------------------------------
-- CRIAÇÃO DAS TABELAS DO SISTEMA DE AVALIAÇÕES
-- ---------------------------------------------------------

-- Tabela de perguntas cadastradas no painel administrativo
CREATE TABLE IF NOT EXISTS perguntas (
    id SERIAL PRIMARY KEY,
    texto TEXT NOT NULL,
    ordem INTEGER NOT NULL,
    escala_max INTEGER NOT NULL DEFAULT 10,
    obrigatoria BOOLEAN NOT NULL DEFAULT true
);

-- Tabela que armazena as respostas anônimas enviadas pelo usuário
CREATE TABLE IF NOT EXISTS respostas (
    id SERIAL PRIMARY KEY,
    pergunta_id INTEGER NOT NULL REFERENCES perguntas(id) ON DELETE CASCADE,
    valor INTEGER,                             -- valor da escala
    feedback TEXT,                              -- usado apenas na pergunta aberta
    data_resposta TIMESTAMP DEFAULT NOW()       -- registro da data/hora, ainda anônimo
);

-- ---------------------------------------------------------
-- INSERÇÃO DAS PERGUNTAS PADRÃO (0 A 10, TODAS OBRIGATÓRIAS)
-- ---------------------------------------------------------

INSERT INTO perguntas (texto, ordem, escala_max, obrigatoria) VALUES
('Como você avalia a cordialidade dos funcionários?', 1, 10, true),
('Os atendentes demonstraram interesse em ajudar?', 2, 10, true),
('O tempo de espera pelo atendimento foi satisfatório?', 3, 10, true),
('Como você avalia a limpeza do ambiente?', 4, 10, true),
('A iluminação do local é adequada?', 5, 10, true),
('A ventilação e temperatura do ambiente estavam confortáveis?', 6, 10, true),
('Os assentos e mobiliários estavam em boas condições?', 7, 10, true),
('A qualidade do serviço prestado atendeu suas expectativas?', 8, 10, true),
('O serviço foi prestado no tempo esperado?', 9, 10, true),
('Você recomendaria nosso estabelecimento para outras pessoas?', 10, 10, true);

-- Pergunta aberta (feedback opcional)
INSERT INTO perguntas (texto, ordem, escala_max, obrigatoria) VALUES
('Descreva qualquer sugestão, elogio ou problema encontrado (opcional):', 11, 0, false);
