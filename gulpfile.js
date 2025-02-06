const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const browserSync = require('browser-sync').create(); // 修正: browserSync のインスタンスを生成
const plumber = require('gulp-plumber');
const notify = require('gulp-notify');
const autoprefixer = require('gulp-autoprefixer');

// 開発用ソースパス
const srcPath = {
  scss: './src/scss/**/*.scss',
  images: './src/images/**/*',
  php: './**/*.php',
};

// 出力先パス
const destPath = {
  css: './css/',
};

// Sassのコンパイルタスク
const compSass = () => {
  return gulp.src(srcPath.scss, { sourcemaps: true })
    .pipe(plumber({ errorHandler: notify.onError('Error!!: <%= error.message %>') }))
    .pipe(sass({ outputStyle: 'expanded' }))
    .pipe(autoprefixer())
    .pipe(gulp.dest(destPath.css, { sourcemaps: './' }))
    .pipe(browserSync.stream());
};

// BrowserSync設定
const browserSyncOption = {
  proxy: 'http://localhost:8893/service/',
  open: true,
  watchOptions: {
    debounceDelay: 1000,
  },
  reloadOnRestart: true,
};

// BrowserSync初期化タスク
const browserSyncFunc = (done) => {
  browserSync.init(browserSyncOption);
  done();
};

// ファイル監視タスク
const watchFiles = () => {
  gulp.watch(srcPath.scss, gulp.series(compSass));
  gulp.watch(srcPath.php).on('change', browserSync.reload);
};

// デフォルトタスク
exports.default = gulp.series(
  compSass,
  gulp.parallel(watchFiles, browserSyncFunc)
);
