<template>
    <div class="editor" v-if="editor">
        <menu-bar class="editor__header" :editor="editor">
            <template v-slot:image>
                <input
                    type="file"
                    class="d-none"
                    id="file-input"
                    @change="uploadImageHandler"
                />
                <button
                    type="button"
                    class="menu-item"
                    title="image"
                    @click="showFileHandler"
                >
                    <svg class="remix">
                        <use :xlink:href="`${remixiconUrl}#ri-image-line`" />
                    </svg>
                </button>
            </template>

            <template v-slot:color>
                <button
                    type="button"
                    class="menu-item"
                    title="color"
                    @click="showColorBox"
                >
                    <svg class="remix">
                        <use :xlink:href="`${remixiconUrl}#ri-font-color`" />
                    </svg>
                </button>

                <div style="position: relative">
                    <input
                        id="color-box"
                        ref="color"
                        style="visibility: hidden"
                        type="color"
                        @input="
                            editor
                                .chain()
                                .focus()
                                .setColor($event.target.value)
                                .run()
                        "
                        :value="editor.getAttributes('textStyle').color"
                    />
                </div>
            </template>
        </menu-bar>

        <editor-content
            v-bind="$attrs"
            class="editor__content"
            :editor="editor"
        />

        <!-- <dropzone-modal ref="dropzone" @image="upload"></dropzone-modal> -->
    </div>
</template>

<script>
import { Editor, EditorContent } from "@tiptap/vue-3";
import StarterKit from "@tiptap/starter-kit";

// import TaskList from "@tiptap/extension-task-list";
// import TaskItem from "@tiptap/extension-task-item";
// import Highlight from "@tiptap/extension-highlight";
// import CharacterCount from "@tiptap/extension-character-count";
// import Placeholder from "@tiptap/extension-placeholder";
import Image from "@tiptap/extension-image";
import MenuBar from "@/components/tiptap/MenuBar.vue";
import TextStyle from "@tiptap/extension-text-style";
import { Color } from "@tiptap/extension-color";
import remixiconUrl from "remixicon/fonts/remixicon.symbol.svg";
// import DropzoneModal from "./DropzoneModal.vue";
import { ref, onMounted, onUnmounted } from "vue";
export default {
    inheritAttrs: false,
    components: {
        EditorContent,
        MenuBar,
    },

    props: {
        content: {
            require: true,
        },
    },

    // props: {
    //     modelValue: {
    //         type: String,
    //         default: "",
    //     },
    // },

    setup(props, { emit }) {
        const dropzone = ref(null);

        const editor = ref(null);

        const file = ref(null);

        const color = ref(null);

        // const openModal = () => {
        //     dropzone.value.openModal();
        // };

        // const upload = data => {
        //     const src = data.attrs;
        //     editor.value
        //         .chain()
        //         .focus()
        //         .setImage(src)
        //         .run();
        // };
        const showColorBox = () => {
            // color.value.click();
            document.getElementById("color-box").click();
        };

        const showFileHandler = () => {
            // color.value.click();
            document.getElementById("file-input").click();
        };

        const uploadImageHandler = (event) => {
            // filename.value = event.target.files[0].name;
            // src.value = URL.createObjectURL(event.target.files[0]);
            file.value = event.target.files[0];

            const data = new FormData();

            data.append("file", file.value);

            axios
                .post("/api/admin/upload/editor", data)
                .then(({ data }) => {
                    console.log(data.data);
                    // editor.value.chain().focus().setImage(data.data).run();
                    editor.value.commands.setImage({ src: data.data });
                })
                .catch((error) => {});
        };

        onMounted(() => {
            editor.value = new Editor({
                extensions: [
                    StarterKit.configure({
                        history: true,
                    }),

                    Image,
                    TextStyle,
                    Color,
                ],
                content: props.content,

                onUpdate: () => {
                    emit("update:modelValue", editor.value.getHTML());
                },
            });
        });

        onUnmounted(() => {
            editor.value.destroy();
        });

        return {
            editor,
            // dropzone,
            remixiconUrl,
            showFileHandler,
            uploadImageHandler,
            showColorBox,
            // openModal,
            // upload
        };
    },
};
</script>

<style lang="scss">
.editor {
    display: flex;
    flex-direction: column;
    max-height: 26rem;
    color: #0d0d0d;
    background-color: #fff;
    border: 3px solid #0d0d0d;
    border-radius: 0.75rem;

    &__header {
        display: flex;
        align-items: center;
        flex: 0 0 auto;
        flex-wrap: wrap;
        padding: 0.25rem;
        border-bottom: 3px solid #0d0d0d;
    }

    &__content {
        padding: 1.25rem 1rem;
        flex: 1 1 auto;
        overflow-x: hidden;
        overflow-y: auto;
        -webkit-overflow-scrolling: touch;
    }

    &__footer {
        display: flex;
        flex: 0 0 auto;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        white-space: nowrap;
        border-top: 3px solid #0d0d0d;
        font-size: 12px;
        font-weight: 600;
        color: #0d0d0d;
        white-space: nowrap;
        padding: 0.25rem 0.75rem;
    }

    /* Some information about the status */
    &__status {
        display: flex;
        align-items: center;
        border-radius: 5px;

        &::before {
            content: " ";
            flex: 0 0 auto;
            display: inline-block;
            width: 0.5rem;
            height: 0.5rem;
            background: rgba(#0d0d0d, 0.5);
            border-radius: 50%;
            margin-right: 0.5rem;
        }

        &--connecting::before {
            background: #616161;
        }

        &--connected::before {
            background: #b9f18d;
        }
    }

    &__name {
        button {
            background: none;
            border: none;
            font: inherit;
            font-size: 12px;
            font-weight: 600;
            color: #0d0d0d;
            border-radius: 0.4rem;
            padding: 0.25rem 0.5rem;

            &:hover {
                color: #fff;
                background-color: #0d0d0d;
            }
        }
    }
}
</style>

<style lang="scss">
/* Give a remote user a caret */
.collaboration-cursor__caret {
    position: relative;
    margin-left: -1px;
    margin-right: -1px;
    border-left: 1px solid #0d0d0d;
    border-right: 1px solid #0d0d0d;
    word-break: normal;
    pointer-events: none;
}

/* Render the username above the caret */
.collaboration-cursor__label {
    position: absolute;
    top: -1.4em;
    left: -1px;
    font-size: 12px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
    user-select: none;
    color: #0d0d0d;
    padding: 0.1rem 0.3rem;
    border-radius: 3px 3px 3px 0;
    white-space: nowrap;
}

/* Basic editor styles */
.ProseMirror {
    > * + * {
        margin-top: 0.75em;
    }

    ul,
    ol {
        padding: 0 1rem;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        line-height: 1.1;
    }

    code {
        background-color: rgba(#616161, 0.1);
        color: #616161;
    }

    pre {
        background: #0d0d0d;
        color: #fff;
        font-family: "JetBrainsMono", monospace;
        padding: 0.75rem 1rem;
        border-radius: 0.5rem;

        code {
            color: inherit;
            padding: 0;
            background: none;
            font-size: 0.8rem;
        }
    }

    mark {
        background-color: #faf594;
    }

    img {
        max-width: 100%;
        height: auto;
    }

    hr {
        margin: 1rem 0;
    }

    blockquote {
        padding-left: 1rem;
        border-left: 2px solid rgba(#0d0d0d, 0.1);
    }

    hr {
        border: none;
        border-top: 2px solid rgba(#0d0d0d, 0.1);
        margin: 2rem 0;
    }

    ul[data-type="taskList"] {
        list-style: none;
        padding: 0;

        li {
            display: flex;
            align-items: center;

            > label {
                flex: 0 0 auto;
                margin-right: 0.5rem;
                user-select: none;
            }

            > div {
                flex: 1 1 auto;
            }
        }
    }
}
</style>
