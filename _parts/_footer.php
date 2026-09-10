<style>
.gg-footer {
    background-color: #de9ca4;
    padding: 20px 16px;
    width: 100%;
}
.gg-footer-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 12px 8px;
    max-width: 600px;
    margin: 0 auto;
}
@media (min-width: 768px) {
    .gg-footer-grid {
        grid-template-columns: repeat(4, 1fr);
        max-width: 900px;
    }
}
.gg-footer-item {
    display: flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
    color: inherit;
    padding: 6px 4px;
}
.gg-footer-item:hover { opacity: 0.85; }
.gg-footer-icon {
    background: #fff;
    border-radius: 50%;
    width: 38px;
    height: 38px;
    min-width: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    color: #de9ca4;
    box-shadow: 0 2px 4px rgba(0,0,0,0.12);
}
.gg-footer-txt p {
    margin: 0;
    line-height: 1.3;
    color: #fff;
}
.gg-footer-label { font-size: 0.72rem; font-weight: 700; }
.gg-footer-value { font-size: 0.82rem; }
</style>

<footer class="gg-footer">
    <div class="gg-footer-grid">

        <a href="https://wa.me/556999999999" class="gg-footer-item">
            <div class="gg-footer-icon"><i class="bi bi-whatsapp"></i></div>
            <div class="gg-footer-txt">
                <p class="gg-footer-label">WhatsApp</p>
                <p class="gg-footer-value">(69) 9 9999-9999</p>
            </div>
        </a>

        <a href="tel:+556999999999" class="gg-footer-item">
            <div class="gg-footer-icon"><i class="bi bi-telephone"></i></div>
            <div class="gg-footer-txt">
                <p class="gg-footer-label">Telefone</p>
                <p class="gg-footer-value">(69) 9 9999-9999</p>
            </div>
        </a>

        <a href="https://www.instagram.com/girlsgroup" target="_blank" class="gg-footer-item">
            <div class="gg-footer-icon"><i class="bi bi-instagram"></i></div>
            <div class="gg-footer-txt">
                <p class="gg-footer-label">Instagram</p>
                <p class="gg-footer-value">@girlsgroup</p>
            </div>
        </a>

        <a href="https://www.facebook.com/girlsgroup" target="_blank" class="gg-footer-item">
            <div class="gg-footer-icon"><i class="bi bi-facebook"></i></div>
            <div class="gg-footer-txt">
                <p class="gg-footer-label">Facebook</p>
                <p class="gg-footer-value">@girlsgroup</p>
            </div>
        </a>

    </div>
</footer>
