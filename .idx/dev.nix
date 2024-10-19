{pkgs}: {
  channel = "stable-23.11";
  packages = [
    pkgs.nodejs_20
    pkgs.php83
  ];
  idx.extensions = [
    "svelte.svelte-vscode"
    "vue.volar"
    "bmewburn.vscode-intelephense-client"
    "CloudStudio.common"
    "CloudStudio.github-authentication"
    "codingyu.laravel-goto-view"
    "eamodio.gitlens"
    "EditorConfig.EditorConfig"
    "esbenp.prettier-vscode"
    "mohamedbenhida.laravel-intellisense"
    "MrChetan.goto-laravel-components"
    "MrChetan.laravel-goto-config"
    "onecentlin.laravel-blade"
    "onecentlin.laravel5-snippets"
    "shufo.vscode-blade-formatter"
  ];
}
