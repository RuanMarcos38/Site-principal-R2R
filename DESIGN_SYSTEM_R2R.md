# Design System — R2R Marketing Digital

Baseado nos materiais anexados: site atual R2R, identidade dark premium, vídeo de hero e elementos visuais de performance/IA.

## Objetivo de usabilidade

Landing Page para vender serviços digitais da R2R Marketing Digital: tráfego pago, Google Ads, Meta Ads, criação de sites/landing pages, curso de tráfego pago e CRM com IA. O foco é gerar confiança rápida, deixar a oferta clara e conduzir o usuário para WhatsApp ou páginas de conversão.

## Cores

### Paleta principal

| Token | Uso | Hex |
|---|---|---|
| `--bg` | Fundo principal escuro | `#020511` |
| `--bg-2` | Fundo secundário / seções | `#070A1C` |
| `--surface` | Cards e painéis | `#080D22` |
| `--surface-2` | Inputs e boxes internos | `#101827` |
| `--text` | Texto principal | `#FFFFFF` |
| `--muted` | Texto secundário | `#D6D9E8` |

### Paleta secundária

| Token | Uso | Hex |
|---|---|---|
| `--purple` | Gradientes, destaques, bordas | `#9338FF` |
| `--blue` | Gradientes e CTAs | `#0A9DFF` |
| `--cyan` | Linhas, glow, bordas tecnológicas | `#00E5FF` |
| `--green` | WhatsApp, métricas positivas | `#20E974` |

### Paleta de suporte

| Token | Uso | Hex |
|---|---|---|
| `--violet-dark` | Fundos com profundidade | `#2A0B5E` |
| `--electric-blue` | Highlights / luzes do vídeo | `#1677FF` |
| `--card-border` | Borda sutil em cards | `#1B365D` |
| `--danger` | Alertas negativos, se necessário | `#FF4D6D` |
| `--warning` | Atenção / destaque promocional | `#FFB020` |

## Tipografia

### Fontes sugeridas

Sem dependências externas:
- Primária: `Inter, Arial, Helvetica, sans-serif`
- Alternativa de impacto: `Arial Black, Impact, Inter, sans-serif`
- Alternativa premium para títulos: `Montserrat, Poppins, Inter, sans-serif`

### Hierarquia

| Elemento | Tamanho mobile | Tamanho desktop | Peso | Line-height |
|---|---:|---:|---:|---:|
| H1 | 40px–48px | 64px–82px | 900/950 | 0.98 |
| H2 | 30px–38px | 44px–56px | 900 | 1.05 |
| H3 | 20px–24px | 22px–28px | 800/900 | 1.15 |
| Eyebrow | 12px–13px | 13px–15px | 900 | 1.2 |
| Corpo | 16px–17px | 17px–20px | 400/500 | 1.55 |
| Texto pequeno | 13px–14px | 14px–15px | 500/600 | 1.45 |
| Botões | 15px–16px | 15px–17px | 800/900 | 1 |

## Componentes

### Botões

**Primário**
- Fundo: gradiente `#9338FF → #0A9DFF`
- Texto: `#FFFFFF`
- Altura mínima: `48px`; mobile mínimo de toque `44px`
- Border-radius: `14px`
- Sombra: `0 18px 45px rgba(10, 157, 255, .28)`
- Hover: `translateY(-2px)` + aumento de brilho

**Secundário**
- Fundo: `rgba(255,255,255,.04)`
- Borda: `1px solid rgba(255,255,255,.18)`
- Hover: borda `#00E5FF` e background levemente mais claro

**WhatsApp**
- Fundo/borda com `#20E974`
- Usar ícone simples e texto direto
- CTA curto e claro

### Inputs de formulário

- Fundo: `rgba(255,255,255,.06)`
- Borda: `1px solid rgba(255,255,255,.14)`
- Texto: `#FFFFFF`
- Placeholder: `rgba(214,217,232,.65)`
- Focus: borda `#00E5FF`, sombra `0 0 0 4px rgba(0,229,255,.12)`
- Border-radius: `14px`
- Altura mínima: `48px`

### Cards

- Fundo: `linear-gradient(180deg, rgba(255,255,255,.075), rgba(255,255,255,.035))`
- Borda: `1px solid rgba(255,255,255,.11)`
- Border-radius: `22px`
- Padding: `22px–32px`
- Sombra: `0 18px 60px rgba(0,0,0,.20)`
- Ícone: box `46px`, radius `14px`, gradiente roxo/azul

## Estética

### Arredondamentos

| Elemento | Radius |
|---|---:|
| Botões | 14px |
| Inputs | 14px |
| Cards pequenos | 18px–22px |
| Painéis grandes | 24px–28px |
| Badges/eyebrow | 10px–12px |
| Ícones | 12px–14px |

### Sombras

- Cards: `0 18px 60px rgba(0,0,0,.20)`
- CTA primário: `0 18px 45px rgba(10,157,255,.28)`
- Glow tecnológico: `0 0 30px rgba(147,56,255,.25)`
- Hero: overlay escuro para manter contraste AA

### Espaçamentos

- Container: `min(1180px, calc(100% - 32px))`
- Seções mobile: `48px–64px`
- Seções desktop: `72px–96px`
- Gap cards: `18px–26px`
- Padding cards: `22px–34px`
- Hero mobile: conteúdo com respiro mínimo de `88px` abaixo do header

## Regras visuais

1. Fundo escuro sempre com gradientes e glow azul/roxo.
2. Títulos grandes, compactos, com tracking negativo.
3. Evitar poluição visual; cards precisam ter leitura rápida.
4. CTAs sempre visíveis e com contraste forte.
5. Vídeo de hero deve ficar atrás de overlay escuro para legibilidade.
6. Mobile-first: botões grandes, texto legível e seções curtas.
