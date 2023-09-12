
# Random_Images 项目介绍

**Random_Images** 是一个基于腾讯云 COS (Cloud Object Storage) 的 PHP 项目，用于在网页上随机显示存储桶中的图片。这个项目允许你轻松地创建一个动态的网页，每次加载时都会显示不同的图片，使你的网站更具吸引力。

## 特性

- 随机显示腾讯云 COS 存储桶中的图片。
- 支持多种图片格式，包括 JPEG、PNG、GIF 等。
- 可配置的 COS 凭据和存储桶名称。

# 安装和使用

## 系统要求

确保你的服务器满足以下要求：

- PHP 版本：PHP 7.0 或更高版本。
- Composer：用于管理 PHP 依赖项。

## 安装步骤

要开始使用 Random_Images 项目，按照以下步骤进行安装：

1. 下载项目文件或使用 Git 克隆项目：

   ```
   git clone https://github.com/ouorun/Random_Images.git
   ```

2. 进入项目目录：

   ```
   cd Random_Images
   ```

3. 使用 Composer 安装项目依赖：

   ```
   composer install
   ```

## 配置 COS

在开始之前，确保你已经拥有腾讯云 COS 的凭据，并在 `cos-config.php` 配置文件中填写正确的信息：

```php
// cos-config.php

return [
    'region' => 'ap-shanghai',
    'credentials' => [
        'appId' => 'YOUR_APP_ID',
        'secretId'    => 'YOUR_SECRET_ID',
        'secretKey' => 'YOUR_SECRET_KEY',
    ],
    'bucket' => 'YOUR_BUCKET_NAME', // 将存储桶名称匿名化
];
```

## 使用

在安装和配置完成后，你可以通过访问 `index.php` 文件来查看随机显示的图片。

# 注意事项

在使用 Random_Images 项目时，请注意以下事项：

- **安全性**：请不要分享包含敏感信息的 `cos-config.php` 文件。确保不泄露腾讯云 COS 的凭据。

- **图片格式**：确保存储桶中的图片是支持的格式（JPEG、PNG、GIF 等）。

- **存储桶权限**：确保 COS 存储桶具有适当的访问权限，以便 PHP 能够读取图片。

- **图片数量**：随机图片是从存储桶中选择的，因此存储桶中应该有足够多的图片。

Random_Images 项目是一个简单而有趣的工具，可用于增强你的网站体验。使用时请遵循最佳实践和注意事项以确保安全性和正常运行。希望你享受使用这个项目！
