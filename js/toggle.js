// 「サインアップ」ボタンの要素を取得
const signUpButton = document.getElementById('signUp');
// 「サインイン」ボタンの要素を取得
const signInButton = document.getElementById('signIn');
// フォーム全体を包むコンテナを取得
const container = document.getElementById('container');

// 「サインアップ」ボタンがクリックされたときの処理
signUpButton.addEventListener('click', () => {
    // コンテナに right-panel-active クラスを追加
    // → サインアップ画面がスライドインで表示される
    container.classList.add("right-panel-active");
});
// 「サインイン」ボタンがクリックされたときの処理
signInButton.addEventListener('click', () => {
    // right-panel-active クラスを削除
    // → サインイン画面がスライドインで表示される
    container.classList.remove("right-panel-active");
});