document.addEventListener('DOMContentLoaded', () => {
    const formInputs = document.querySelectorAll('.p-cf7__item input, .p-cf7__item select, .p-cf7__item textarea');
    const requiredInputs = document.querySelectorAll('[aria-required="true"]');
    const confirmButton = document.querySelector(".p-cf7__confirm-btn");
    const backButton = document.querySelector(".p-cf7__back-btn");
    const required = document.querySelectorAll('.wpcf7-validates-as-required');
    let requiredArray = {};
    const submit = document.querySelector('.wpcf7-submit');
    const attention = document.querySelector('.p-cf7__attention');

    // 確認画面を更新する関数
    function updateConfirmField(input) {
        const val = input.value;
        const type = input.getAttribute("type");
        const id = input.closest("[id]")?.id || input.id;

        if (!id) return;

        const confirmField = document.querySelector(`.js-confirm__${id}`);
        if (!confirmField) return;

        if (type === "radio") {
            // ラジオボタンが選択されている場合の処理
            const selectedRadio = document.querySelector(`input[name="${input.name}"]:checked`);
            if (selectedRadio) {
                confirmField.textContent = selectedRadio.nextElementSibling.textContent; // ラベルのテキストを表示
            }
        } else if (type === "checkbox") {
            const checkValues = [...document.querySelectorAll(`#${id} [type="checkbox"]:checked`)].map(cb => cb.value);
            confirmField.textContent = checkValues.join(" / ");
        } else {
            confirmField.textContent = val;
        }
    }

    //必須項目のチェック
    if (required.length > 0) {
        submit.disabled = true;
        attention.classList.add('is-active');
        required.forEach((el) => {
            if (el.value === '') {
                requiredArray[el.name] = false;
            }
            el.addEventListener('input', () => {
                if (el.value === '') {
                    requiredArray[el.name] = false;
                } else if (requiredArray[el.name] === false) {
                    delete requiredArray[el.name];
                }
                if (Object.keys(requiredArray).length === 0) {
                    submit.disabled = false;
                    attention.classList.remove('is-active');
                } else {
                    submit.disabled = true;
                    attention.classList.add('is-active');
                }
            });
        });
    }
    // 入力変更イベント
    formInputs.forEach(input => {
        input.addEventListener('change', () => updateConfirmField(input));
    });

    // 初期状態で確認画面を更新
    formInputs.forEach(input => {
        updateConfirmField(input);
    });

    // 確認ボタンの有効化/無効化
    const isAllRequiredFilled = () => {
        return [...requiredInputs].every(input => input.value.trim() !== "");
    };
    requiredInputs.forEach(input => {
        input.addEventListener('input', () => {
            confirmButton.disabled = !isAllRequiredFilled();
        });
    });

    // 確認画面への切り替え
    confirmButton.addEventListener('click', () => {
        document.querySelector(".p-cf7").style.display = 'none';
        document.querySelector(".p-cf7__confirm").style.display = 'block';
        window.scrollTo(0, document.querySelector('#navi').getBoundingClientRect().top);
    });

    // フォームに戻る
    backButton.addEventListener('click', () => {
        document.querySelector(".p-cf7").style.display = 'block';
        document.querySelector(".p-cf7__confirm").style.display = 'none';
        window.scrollTo(0, document.querySelector('#navi').getBoundingClientRect().top);
    });

    // 送信後のリダイレクト
    document.addEventListener('wpcf7mailsent', () => {
        location.href = '/thanks/';
    });
});