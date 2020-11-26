const $ = <T>(elm?: T, bool?: boolean) => {
    const query = (elm: string) => <HTMLElement>document.querySelector(elm);
    const querys = (elm: string) => document.querySelectorAll(elm);

    const event = (
        value: string,
        listener: EventListenerOrEventListenerObject,
        options?: boolean | AddEventListenerOptions | undefined
    ): void => {
        if (typeof elm != "string")
            document.addEventListener(value, listener, options);
        else query(elm).addEventListener(value, listener, options);
    };
    const attr = (qualifiedName: string) => {
        if (typeof elm == "string")
            return query(elm).getAttribute(qualifiedName);
        if (elm instanceof Element) return elm.getAttribute(qualifiedName);
    };
    const each = (
        callbackfn: (
            value: Element,
            key: number,
            parent: NodeListOf<Element>
        ) => void
    ) => {
        if (bool && typeof elm == "string") querys(elm).forEach(callbackfn);
    };
    interface keyFor {
        [key: string]: string;
    }
    const css = (style: keyFor) => {
        for (const key in style) {
            const value = style[key];
            if (typeof elm == "string")
                query(elm).style.setProperty(key, value)
        }
    };
    return { event, attr, each, css, query, querys };
};
const layers = $(".overlay__layer", true);
const bg = $(".background-sign__parallax");
layers.each((elm) => {
    const attr = $(elm).attr("data-speed");
    console.log(attr);
});
