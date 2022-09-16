import { createI18n } from 'vue-i18n'
import en from "./lang/en.json";
import fr from "./lang/fr.json";

const messages = Object.assign({
  en: en,
  fr: fr,
});

const i18n = new createI18n({
  locale: config.language,
  fallbackLocale: 'en',
  messages,
  silentTranslationWarn: true,
});

export default i18n;
